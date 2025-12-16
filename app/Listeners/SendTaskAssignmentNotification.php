<?php

namespace App\Listeners;

use App\Events\TaskAssigned;
use App\Mail\TaskAssignedMail;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Support\Facades\Mail;

class SendTaskAssignmentNotification implements ShouldQueue
{
    public function handle(TaskAssigned $event): void
    {
        $event->task->loadMissing('project');
        $assigneeEmail = $event->assignee->email;

        if (!$assigneeEmail) {
            return;
        }

        Mail::to($assigneeEmail)->send(new TaskAssignedMail(
            $event->task,
            $event->assignee,
            $event->isUpdate
        ));
    }
}

