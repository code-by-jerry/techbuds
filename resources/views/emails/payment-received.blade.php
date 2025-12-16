<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <style>
        body { font-family: Arial, sans-serif; background: #f5f7fb; padding: 24px; color: #11224E; }
        .card { max-width: 640px; margin: 0 auto; background: #ffffff; border-radius: 16px; padding: 32px; border: 1px solid #e5e7ef; }
        .muted { color: #6b7280; font-size: 13px; margin-top: 24px; }
        table { width: 100%; border-collapse: collapse; margin-top: 20px; }
        th, td { text-align: left; padding: 8px 0; }
    </style>
</head>
<body>
    <div class="card">
        <h2 style="margin-bottom: 8px;">Payment Received</h2>
        <p>Hi {{ $invoice->project?->client?->name ?? 'Client' }},</p>
        <p>We have received your payment for invoice {{ $invoice->invoice_number }}. Thank you!</p>

        <table>
            <tr>
                <th>Paid Amount</th>
                <td>₹{{ number_format($payment->amount, 2) }}</td>
            </tr>
            <tr>
                <th>Payment Date</th>
                <td>{{ $payment->payment_date?->format('M d, Y') }}</td>
            </tr>
            <tr>
                <th>Method</th>
                <td>{{ ucfirst(str_replace('_', ' ', $payment->payment_method)) }}</td>
            </tr>
            <tr>
                <th>Remaining Balance</th>
                <td>₹{{ number_format($invoice->remaining_amount, 2) }}</td>
            </tr>
        </table>

        <p class="muted">If anything looks incorrect, please contact support.</p>
    </div>
</body>
</html>

