<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Invoice {{ $invoice->invoice_number }}</title>
    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }
        body {
            font-family: 'DejaVu Sans', Arial, sans-serif;
            font-size: 12px;
            color: #333;
            line-height: 1.6;
        }
        .container {
            max-width: 800px;
            margin: 0 auto;
            padding: 40px;
        }
        .header {
            display: flex;
            justify-content: space-between;
            margin-bottom: 40px;
            padding-bottom: 20px;
            border-bottom: 3px solid #088395;
        }
        .logo {
            font-size: 24px;
            font-weight: bold;
            color: #088395;
        }
        .invoice-title {
            text-align: right;
        }
        .invoice-title h1 {
            font-size: 32px;
            color: #11224E;
            margin-bottom: 5px;
        }
        .invoice-title p {
            color: #666;
            font-size: 14px;
        }
        .info-section {
            display: flex;
            justify-content: space-between;
            margin-bottom: 30px;
        }
        .info-box {
            width: 48%;
        }
        .info-box h3 {
            color: #088395;
            font-size: 14px;
            margin-bottom: 10px;
            padding-bottom: 5px;
            border-bottom: 1px solid #e0e0e0;
        }
        .info-box p {
            margin: 5px 0;
            color: #333;
        }
        .items-table {
            width: 100%;
            border-collapse: collapse;
            margin-bottom: 30px;
        }
        .items-table thead {
            background-color: #088395;
            color: white;
        }
        .items-table th {
            padding: 12px;
            text-align: left;
            font-weight: bold;
        }
        .items-table td {
            padding: 12px;
            border-bottom: 1px solid #e0e0e0;
        }
        .items-table tbody tr:hover {
            background-color: #f5f5f5;
        }
        .text-right {
            text-align: right;
        }
        .totals {
            width: 100%;
            margin-left: auto;
            margin-bottom: 30px;
        }
        .totals table {
            width: 300px;
            margin-left: auto;
        }
        .totals td {
            padding: 8px 12px;
            border-bottom: 1px solid #e0e0e0;
        }
        .totals td:first-child {
            text-align: right;
            font-weight: bold;
            color: #666;
        }
        .totals td:last-child {
            text-align: right;
            font-weight: bold;
            color: #11224E;
        }
        .totals .total-row {
            background-color: #088395;
            color: white;
            font-size: 16px;
        }
        .totals .total-row td {
            border-bottom: none;
            padding: 15px 12px;
        }
        .status-badge {
            display: inline-block;
            padding: 5px 15px;
            border-radius: 20px;
            font-size: 11px;
            font-weight: bold;
            text-transform: uppercase;
        }
        .status-draft { background-color: #e0e0e0; color: #666; }
        .status-sent { background-color: #b3d9ff; color: #0066cc; }
        .status-paid { background-color: #c8e6c9; color: #2e7d32; }
        .status-partial { background-color: #fff9c4; color: #f57f17; }
        .status-overdue { background-color: #ffcdd2; color: #c62828; }
        .status-cancelled { background-color: #f5f5f5; color: #757575; }
        .notes {
            margin-top: 30px;
            padding: 15px;
            background-color: #f9f9f9;
            border-left: 4px solid #088395;
        }
        .notes h4 {
            color: #088395;
            margin-bottom: 10px;
        }
        .footer {
            margin-top: 50px;
            padding-top: 20px;
            border-top: 1px solid #e0e0e0;
            text-align: center;
            color: #666;
            font-size: 10px;
        }
        .payments-section {
            margin-top: 30px;
        }
        .payments-section h4 {
            color: #088395;
            margin-bottom: 15px;
        }
        .payments-table {
            width: 100%;
            border-collapse: collapse;
        }
        .payments-table th {
            background-color: #f5f5f5;
            padding: 10px;
            text-align: left;
            font-weight: bold;
            color: #11224E;
        }
        .payments-table td {
            padding: 10px;
            border-bottom: 1px solid #e0e0e0;
        }
    </style>
</head>
<body>
    <div class="container">
        <!-- Header -->
        <div class="header">
            <div class="logo">
                Tech Buds
            </div>
            <div class="invoice-title">
                <h1>INVOICE</h1>
                <p>Invoice #{{ $invoice->invoice_number }}</p>
            </div>
        </div>

        <!-- Invoice and Client Info -->
        <div class="info-section">
            <div class="info-box">
                <h3>Bill To:</h3>
                <p><strong>{{ $client->name }}</strong></p>
                @if($client->email)
                <p>{{ $client->email }}</p>
                @endif
                @if($client->phone)
                <p>{{ $client->phone }}</p>
                @endif
                @if($client->address)
                <p>{{ $client->address }}</p>
                @endif
            </div>
            <div class="info-box">
                <h3>Invoice Details:</h3>
                <p><strong>Date:</strong> {{ $invoice->invoice_date->format('M d, Y') }}</p>
                <p><strong>Due Date:</strong> {{ $invoice->due_date->format('M d, Y') }}</p>
                <p><strong>Status:</strong> 
                    <span class="status-badge status-{{ $invoice->status }}">
                        {{ ucfirst($invoice->status) }}
                    </span>
                </p>
                @if($invoice->project)
                <p><strong>Project:</strong> {{ $invoice->project->title }}</p>
                @endif
            </div>
        </div>

        <!-- Invoice Items -->
        <table class="items-table">
            <thead>
                <tr>
                    <th>Description</th>
                    <th class="text-right">Amount</th>
                    <th class="text-right">Tax</th>
                    <th class="text-right">Total</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td>
                        @if($invoice->description)
                            {{ $invoice->description }}
                        @else
                            Invoice for {{ $invoice->project->title ?? 'Project' }}
                        @endif
                    </td>
                    <td class="text-right">${{ number_format($invoice->amount, 2) }}</td>
                    <td class="text-right">${{ number_format($invoice->tax_amount, 2) }}</td>
                    <td class="text-right">${{ number_format($invoice->total_amount, 2) }}</td>
                </tr>
            </tbody>
        </table>

        <!-- Totals -->
        <div class="totals">
            <table>
                <tr>
                    <td>Subtotal:</td>
                    <td>${{ number_format($invoice->amount, 2) }}</td>
                </tr>
                <tr>
                    <td>Tax:</td>
                    <td>${{ number_format($invoice->tax_amount, 2) }}</td>
                </tr>
                @if($invoice->total_paid > 0)
                <tr>
                    <td>Paid:</td>
                    <td style="color: #2e7d32;">-${{ number_format($invoice->total_paid, 2) }}</td>
                </tr>
                <tr>
                    <td>Remaining:</td>
                    <td style="color: #c62828;">${{ number_format($invoice->remaining_amount, 2) }}</td>
                </tr>
                @endif
                <tr class="total-row">
                    <td>Total Amount:</td>
                    <td>${{ number_format($invoice->total_amount, 2) }}</td>
                </tr>
            </table>
        </div>

        <!-- Payments Section -->
        @if($invoice->payments->count() > 0)
        <div class="payments-section">
            <h4>Payment History</h4>
            <table class="payments-table">
                <thead>
                    <tr>
                        <th>Date</th>
                        <th>Amount</th>
                        <th>Method</th>
                        <th>Reference</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($invoice->payments as $payment)
                    <tr>
                        <td>{{ $payment->payment_date->format('M d, Y') }}</td>
                        <td>${{ number_format($payment->amount, 2) }}</td>
                        <td>{{ ucfirst($payment->payment_method) }}</td>
                        <td>{{ $payment->payment_reference ?? 'N/A' }}</td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
        @endif

        <!-- Notes -->
        @if($invoice->notes)
        <div class="notes">
            <h4>Notes</h4>
            <p>{{ $invoice->notes }}</p>
        </div>
        @endif

        <!-- Footer -->
        <div class="footer">
            <p>Thank you for your business!</p>
            <p>Tech Buds - Design Develop Deliver</p>
            <p>Generated on {{ now()->format('M d, Y h:i A') }}</p>
        </div>
    </div>
</body>
</html>

