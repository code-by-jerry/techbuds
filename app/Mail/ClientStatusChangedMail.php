<?php

namespace App\Mail;

use App\Models\Client;
use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class ClientStatusChangedMail extends Mailable
{
    use Queueable, SerializesModels;

    public function __construct(
        public Client $client,
        public string $oldStatus,
        public string $newStatus
    ) {
        //
    }

    public function build(): self
    {
        return $this->subject("Update on your status - {$this->client->name}")
            ->view('emails.client-status-changed');
    }
}

