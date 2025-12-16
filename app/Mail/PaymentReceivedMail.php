<?php

namespace App\Mail;

use App\Models\Invoice;
use App\Models\InvoicePayment;
use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class PaymentReceivedMail extends Mailable
{
    use Queueable, SerializesModels;

    public function __construct(
        public Invoice $invoice,
        public InvoicePayment $payment
    ) {
        //
    }

    public function build(): self
    {
        return $this->subject("Payment received for Invoice {$this->invoice->invoice_number}")
            ->view('emails.payment-received');
    }
}

