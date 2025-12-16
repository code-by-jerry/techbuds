<?php

namespace App\Mail;

use App\Models\Project;
use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class ProjectStatusChangedMail extends Mailable
{
    use Queueable, SerializesModels;

    public function __construct(
        public Project $project,
        public string $oldStatus,
        public string $newStatus
    ) {
        //
    }

    public function build(): self
    {
        return $this->subject("Project status update - {$this->project->title}")
            ->view('emails.project-status-changed');
    }
}

