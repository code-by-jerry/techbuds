<?php

namespace App\Listeners;

use App\Events\PaymentReceived;
use App\Mail\PaymentReceivedMail;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Support\Facades\Mail;

class SendPaymentNotification implements ShouldQueue
{
    public function handle(PaymentReceived $event): void
    {
        $event->invoice->loadMissing('project.client', 'payments');
        $clientEmail = $event->invoice->project?->client?->email;

        if (!$clientEmail) {
            return;
        }

        Mail::to($clientEmail)->send(new PaymentReceivedMail(
            $event->invoice,
            $event->payment
        ));
    }
}

