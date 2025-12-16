<?php

namespace App\Listeners;

use App\Events\ClientStatusChanged;
use App\Mail\ClientStatusChangedMail;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Support\Facades\Mail;

class SendClientStatusNotification implements ShouldQueue
{
    public function handle(ClientStatusChanged $event): void
    {
        $clientEmail = $event->client->email;

        if (!$clientEmail) {
            return;
        }

        Mail::to($clientEmail)->send(new ClientStatusChangedMail(
            $event->client,
            $event->oldStatus,
            $event->newStatus
        ));
    }
}

