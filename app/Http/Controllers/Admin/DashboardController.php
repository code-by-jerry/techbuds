<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Client;
use App\Models\Project;
use App\Models\Task;
use App\Models\Invoice;
use App\Models\ActivityLog;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\DB;

class DashboardController extends Controller
{
    /**
     * Display the CRM dashboard.
     */
    public function index()
    {
        // Check permission
        $admin = auth()->guard('admin')->user();
        if ($admin->email !== 'admin@techbuds.online' && !$admin->can('clients.list')) {
            abort(403, 'You do not have permission to view the dashboard.');
        }

        $now = Carbon::now();

        $metrics = Cache::remember('dashboard.metrics', $now->copy()->addMinutes(15), function () use ($now) {
            $clientStats = [
                'totalClients' => Client::count(),
                'activeClients' => Client::active()->count(),
                'newClientsThisMonth' => Client::whereBetween('created_at', [$now->copy()->startOfMonth(), $now->copy()->endOfMonth()])->count(),
            ];

            $projectStats = [
                'totalProjects' => Project::count(),
                'activeProjects' => Project::whereNotIn('status', ['completed', 'cancelled'])->count(),
                'projectsInDevelopment' => Project::where('status', 'development')->count(),
                'completedProjects' => Project::where('status', 'completed')->count(),
            ];

            $taskStats = [
                'totalTasks' => Task::count(),
                'completedTasks' => Task::where('status', 'completed')->count(),
                'tasksInProgress' => Task::where('status', 'in_progress')->count(),
                'overdueTasks' => Task::where('due_date', '<', Carbon::now())
                    ->whereNotIn('status', ['completed', 'cancelled'])
                    ->count(),
            ];

            $invoiceStats = [
                'totalInvoices' => Invoice::count(),
                'totalRevenue' => Invoice::where('status', 'paid')->sum('total_amount'),
                'pendingInvoices' => Invoice::whereIn('status', ['sent', 'partial', 'overdue'])->count(),
                'overdueInvoices' => Invoice::where('status', 'overdue')->count(),
            ];

            return array_merge($clientStats, $projectStats, $taskStats, $invoiceStats);
        });

        // Recent Activity
        $recentActivity = Cache::remember('dashboard.recent_activity', $now->copy()->addMinutes(5), function () {
            return ActivityLog::with(['user', 'project', 'client'])
                ->latest()
                ->limit(10)
                ->get();
        });

        // Upcoming Deadlines
        $upcomingTasks = Task::where('due_date', '>=', now())
            ->where('due_date', '<=', now()->addDays(7))
            ->whereNotIn('status', ['completed', 'cancelled'])
            ->with(['project', 'assignedTo'])
            ->orderBy('due_date')
            ->limit(10)
            ->get();

        $upcomingMilestones = \App\Models\Milestone::where('due_date', '>=', now())
            ->where('due_date', '<=', now()->addDays(7))
            ->whereNotIn('status', ['completed', 'cancelled'])
            ->with('project')
            ->orderBy('due_date')
            ->limit(10)
            ->get();

        $upcomingInvoices = Invoice::where('due_date', '>=', now())
            ->where('due_date', '<=', now()->addDays(7))
            ->whereNotIn('status', ['paid', 'cancelled'])
            ->with('project.client')
            ->orderBy('due_date')
            ->limit(10)
            ->get();

        // Client Status Distribution
        $clientStatusDistribution = Cache::remember('dashboard.client_status_distribution', $now->copy()->addMinutes(30), function () {
            return Client::select('status', DB::raw('count(*) as count'))
                ->groupBy('status')
                ->get()
                ->pluck('count', 'status');
        });

        $projectStatusDistribution = Cache::remember('dashboard.project_status_distribution', $now->copy()->addMinutes(30), function () {
            return Project::select('status', DB::raw('count(*) as count'))
                ->groupBy('status')
                ->get()
                ->pluck('count', 'status');
        });

        return view('admin.dashboard.index', array_merge($metrics, [
            'recentActivity' => $recentActivity,
            'upcomingTasks' => $upcomingTasks,
            'upcomingMilestones' => $upcomingMilestones,
            'upcomingInvoices' => $upcomingInvoices,
            'clientStatusDistribution' => $clientStatusDistribution,
            'projectStatusDistribution' => $projectStatusDistribution,
        ]));
    }

    /**
     * Display the pipeline Kanban view.
     */
    public function pipeline()
    {
        // Check permission
        $admin = auth()->guard('admin')->user();
        if ($admin->email !== 'admin@techbuds.online' && !$admin->can('clients.list')) {
            abort(403, 'You do not have permission to view the pipeline.');
        }

        // Get all clients grouped by status
        $clientsByStatus = Client::with(['projects', 'creator'])
            ->get()
            ->groupBy('status');

        // Define status order for pipeline
        $statusOrder = [
            'discovery',
            'proposal_sent',
            'proposal_accepted',
            'onboarding',
            'project_started',
            'in_development',
            'in_testing',
            'invoice_sent',
            'paid',
            'offboarding',
            'completed',
            'archived'
        ];

        return view('admin.dashboard.pipeline', compact('clientsByStatus', 'statusOrder'));
    }

    /**
     * Update client status via drag & drop.
     */
    public function updatePipelineStatus(Request $request, Client $client)
    {
        // Check permission
        $admin = auth()->guard('admin')->user();
        if ($admin->email !== 'admin@techbuds.online' && !$admin->can('clients.update')) {
            abort(403, 'You do not have permission to update client status.');
        }

        $validated = $request->validate([
            'status' => 'required|in:discovery,proposal_sent,proposal_accepted,onboarding,project_started,in_development,in_testing,invoice_sent,paid,offboarding,completed,archived',
        ]);

        $oldStatus = $client->status;
        $client->update(['status' => $validated['status']]);

        // Log activity
        \App\Models\ActivityLog::create([
            'user_id' => $admin->id,
            'client_id' => $client->id,
            'action' => 'client_status_changed',
            'description' => "Client status changed from " . ucfirst(str_replace('_', ' ', $oldStatus)) . " to " . ucfirst(str_replace('_', ' ', $client->status)),
            'ip_address' => request()->ip(),
            'user_agent' => request()->userAgent(),
        ]);

        return response()->json([
            'success' => true,
            'message' => 'Client status updated successfully.',
        ]);
    }
}
