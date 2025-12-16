<?php

namespace App\Mail;

use App\Models\Admin;
use App\Models\Task;
use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class TaskAssignedMail extends Mailable
{
    use Queueable, SerializesModels;

    public function __construct(
        public Task $task,
        public Admin $assignee,
        public bool $isUpdate = false
    ) {
        //
    }

    public function build(): self
    {
        $subjectAction = $this->isUpdate ? 'updated' : 'assigned';

        return $this->subject("Task {$subjectAction}: {$this->task->title}")
            ->view('emails.task-assigned');
    }
}

