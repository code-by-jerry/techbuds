<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <style>
        body { font-family: Arial, sans-serif; background: #f5f7fb; padding: 24px; color: var(--heading); }
        .card { max-width: 600px; margin: 0 auto; background: #ffffff; border-radius: 16px; padding: 32px; border: 1px solid #e5e7ef; }
        .btn { display: inline-block; padding: 10px 18px; border-radius: 9999px; background: var(--brand-primary); color: #ffffff; text-decoration: none; font-weight: 600; margin-top: 16px; }
        .muted { color: #6b7280; font-size: 13px; margin-top: 24px; }
    </style>
</head>
<body>
    <div class="card">
        <h2 style="margin-bottom: 8px;">Hi {{ $client->name }},</h2>
        <p>Your CRM status has been updated.</p>

        <div style="margin: 24px 0; padding: 16px; border-left: 4px solid var(--brand-soft); background: #f0fbfd;">
            <p style="margin: 0;"><strong>Previous Status:</strong> {{ ucfirst(str_replace('_', ' ', $oldStatus)) }}</p>
            <p style="margin: 6px 0 0;"><strong>New Status:</strong> {{ ucfirst(str_replace('_', ' ', $newStatus)) }}</p>
        </div>

        <p>If you have any questions, feel free to reply to this email or contact your account manager.</p>

        <a href="{{ url('/admin/clients/' . $client->id) }}" class="btn">View Client Profile</a>

        <p class="muted">Tech Buds · Design · Develop · Deliver</p>
    </div>
</body>
</html>

