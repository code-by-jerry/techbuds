<?php

namespace App\Listeners;

use App\Events\InvoiceSent;
use App\Mail\InvoiceSentMail;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Support\Facades\Mail;

class SendInvoiceNotification implements ShouldQueue
{
    public function handle(InvoiceSent $event): void
    {
        $event->invoice->loadMissing('project.client');
        $clientEmail = $event->invoice->project?->client?->email;

        if (!$clientEmail) {
            return;
        }

        Mail::to($clientEmail)->send(new InvoiceSentMail($event->invoice));
    }
}

