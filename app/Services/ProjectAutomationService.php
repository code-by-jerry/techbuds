<?php

namespace App\Services;

use App\Models\ActivityLog;
use App\Models\Client;
use App\Models\Invoice;
use App\Models\Project;
use App\Models\Task;
use Carbon\Carbon;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;

class ProjectAutomationService
{
    public function run(): array
    {
        DB::connection()->disableQueryLog();

        $results = [
            'invoices_overdue' => $this->markOverdueInvoices(),
            'tasks_overdue' => $this->markOverdueTasks(),
            'projects_updated' => $this->updateProjects(),
            'clients_updated' => $this->syncClients(),
        ];

        Log::info('Automation summary', $results);

        return $results;
    }

    protected function markOverdueInvoices(): int
    {
        if (!config('automation.invoice_overdue.enabled', true)) {
            return 0;
        }

        $threshold = Carbon::today()->subDays(config('automation.invoice_overdue.grace_days', 0));
        $updated = 0;

        Invoice::whereDate('due_date', '<=', $threshold)
            ->whereNotIn('status', ['paid', 'cancelled', 'overdue'])
            ->with('project')
            ->chunkById(100, function ($invoices) use (&$updated) {
                foreach ($invoices as $invoice) {
                    $invoice->status = 'overdue';
                    $invoice->save();

                    $this->logProjectActivity(
                        $invoice->project,
                        'invoice_overdue_auto',
                        "Invoice '{$invoice->invoice_number}' automatically marked as overdue"
                    );

                    $updated++;
                }
            });

        return $updated;
    }

    protected function markOverdueTasks(): int
    {
        if (!config('automation.task_overdue.enabled', true)) {
            return 0;
        }

        $threshold = Carbon::today()->subDays(config('automation.task_overdue.grace_days', 0));
        $updated = 0;

        Task::whereDate('due_date', '<=', $threshold)
            ->whereNotIn('status', ['completed', 'cancelled', 'overdue'])
            ->with('project')
            ->chunkById(100, function ($tasks) use (&$updated) {
                foreach ($tasks as $task) {
                    $task->status = 'overdue';
                    $task->progress_percentage = min(100, $task->progress_percentage ?? 0);
                    $task->save();

                    $this->logProjectActivity(
                        $task->project,
                        'task_overdue_auto',
                        "Task '{$task->title}' automatically marked as overdue"
                    );

                    $updated++;
                }
            });

        return $updated;
    }

    protected function updateProjects(): int
    {
        $updated = 0;

        Project::withCount([
            'tasks as total_tasks',
            'tasks as completed_tasks' => fn ($query) => $query->where('status', 'completed'),
        ])
            ->whereNotIn('status', ['completed', 'cancelled'])
            ->chunkById(50, function ($projects) use (&$updated) {
                foreach ($projects as $project) {
                    $totalTasks = $project->total_tasks;
                    $completedTasks = $project->completed_tasks;
                    $progress = $totalTasks > 0 ? round(($completedTasks / $totalTasks) * 100) : $project->progress_percentage;

                    $progressChanged = false;
                    if ($progress !== null && $progress > ($project->progress_percentage ?? 0)) {
                        $project->progress_percentage = $progress;
                        $progressChanged = true;
                    }

                    $statusChanged = $this->advanceProjectStatus($project, $progress ?? 0);

                    if ($statusChanged || $progressChanged) {
                        $project->save();
                        $updated++;

                        $this->logProjectActivity(
                            $project,
                            'project_auto_update',
                            "Project updated automatically (status: {$project->status}, progress: {$project->progress_percentage}%)"
                        );
                    }
                }
            });

        return $updated;
    }

    protected function syncClients(): int
    {
        $map = config('automation.client_status_map', []);
        if (empty($map)) {
            return 0;
        }

        $updated = 0;

        Client::with('projects')->chunkById(50, function ($clients) use (&$updated, $map) {
            foreach ($clients as $client) {
                $targetStatus = $this->determineClientStatus($client, $map);

                if ($targetStatus && $targetStatus !== $client->status) {
                    $client->status = $targetStatus;
                    $client->save();
                    $updated++;
                    Log::info("Client {$client->id} status auto-updated to {$targetStatus}");
                }
            }
        });

        return $updated;
    }

    protected function determineClientStatus(Client $client, array $map): ?string
    {
        foreach ($map as $clientStatus => $projectStatuses) {
            $match = $client->projects
                ->pluck('status')
                ->filter(fn ($status) => in_array($status, $projectStatuses, true))
                ->isNotEmpty();

            if ($match) {
                return $clientStatus;
            }
        }

        return null;
    }

    protected function advanceProjectStatus(Project $project, float $progress): bool
    {
        $order = config('automation.project.status_order', []);
        $thresholds = config('automation.project.status_thresholds', []);

        if (!$order) {
            return false;
        }

        $currentIndex = array_search($project->status, $order, true);

        if ($progress >= 100 && config('automation.project.auto_complete', true)) {
            if ($project->status !== 'completed') {
                $project->status = 'completed';
                $project->progress_percentage = 100;
                $project->actual_end_date = $project->actual_end_date ?? Carbon::today();
                return true;
            }
            return false;
        }

        foreach ($thresholds as $status => $threshold) {
            $targetIndex = array_search($status, $order, true);
            if ($targetIndex === false || $currentIndex === false) {
                continue;
            }

            if ($progress >= $threshold && $targetIndex > $currentIndex) {
                $project->status = $status;
                return true;
            }
        }

        return false;
    }

    protected function logProjectActivity(?Project $project, string $action, string $description): void
    {
        if (!$project) {
            return;
        }

        ActivityLog::create([
            'user_id' => null,
            'project_id' => $project->id,
            'client_id' => $project->client_id,
            'action' => $action,
            'description' => $description,
            'ip_address' => 'automation',
            'user_agent' => 'automation',
        ]);
    }
}

