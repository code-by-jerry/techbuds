<?php

namespace App\Listeners;

use App\Events\ProjectStatusChanged;
use App\Mail\ProjectStatusChangedMail;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Support\Facades\Mail;

class SendProjectStatusNotification implements ShouldQueue
{
    public function handle(ProjectStatusChanged $event): void
    {
        $event->project->loadMissing('client', 'teamMembers');

        $clientEmail = $event->project->client?->email;
        $teamEmails = $event->project->teamMembers
            ->pluck('email')
            ->filter()
            ->values()
            ->all();

        if (!$clientEmail && empty($teamEmails)) {
            return;
        }

        if ($clientEmail) {
            Mail::to($clientEmail)->send(new ProjectStatusChangedMail(
                $event->project,
                $event->oldStatus,
                $event->newStatus
            ));
        }

        if (!empty($teamEmails)) {
            Mail::to(array_shift($teamEmails))
                ->bcc($teamEmails)
                ->send(new ProjectStatusChangedMail(
                    $event->project,
                    $event->oldStatus,
                    $event->newStatus
                ));
        }
    }
}

