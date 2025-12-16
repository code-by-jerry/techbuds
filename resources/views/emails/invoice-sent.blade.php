<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <style>
        body { font-family: Arial, sans-serif; background: #f5f7fb; padding: 24px; color: #11224E; }
        .card { max-width: 640px; margin: 0 auto; background: #ffffff; border-radius: 16px; padding: 32px; border: 1px solid #e5e7ef; }
        table { width: 100%; border-collapse: collapse; margin-top: 20px; }
        th, td { text-align: left; padding: 8px 0; }
        .muted { color: #6b7280; font-size: 13px; margin-top: 24px; }
        .btn { display:inline-block; padding:10px 18px; border-radius:9999px; background:#088395; color:#fff; text-decoration:none; margin-top:20px; }
    </style>
</head>
<body>
    <div class="card">
        <h2 style="margin-bottom: 8px;">Invoice {{ $invoice->invoice_number }}</h2>
        <p>Dear {{ $invoice->project?->client?->name ?? 'Client' }},</p>
        <p>Thank you for partnering with Tech Buds. Please find the summary of your invoice below.</p>

        <table>
            <tr>
                <th>Project</th>
                <td>{{ $invoice->project?->title ?? 'N/A' }}</td>
            </tr>
            <tr>
                <th>Amount</th>
                <td>₹{{ number_format($invoice->total_amount, 2) }}</td>
            </tr>
            <tr>
                <th>Invoice Date</th>
                <td>{{ $invoice->invoice_date?->format('M d, Y') }}</td>
            </tr>
            <tr>
                <th>Due Date</th>
                <td>{{ $invoice->due_date?->format('M d, Y') }}</td>
            </tr>
            <tr>
                <th>Status</th>
                <td>{{ ucfirst($invoice->status) }}</td>
            </tr>
        </table>

        @if($invoice->payment_link)
            <a href="{{ $invoice->payment_link }}" class="btn">Pay Invoice</a>
        @endif

        <p class="muted">If you have already made the payment, please ignore this message.</p>
    </div>
</body>
</html>

