<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <style>
        body { font-family: Arial, sans-serif; background: #f5f7fb; padding: 24px; color: var(--heading); }
        .card { max-width: 640px; margin: 0 auto; background: #ffffff; border-radius: 16px; padding: 32px; border: 1px solid #e5e7ef; }
        .muted { color: #6b7280; font-size: 13px; margin-top: 24px; }
        .badge { display: inline-block; padding: 6px 14px; border-radius: 9999px; background: var(--brand-primary); color: #ffffff; text-transform: capitalize; }
    </style>
</head>
<body>
    <div class="card">
        <h2 style="margin-bottom: 8px;">Project Update: {{ $project->title }}</h2>
        <p>The project status has been updated.</p>

        <div style="display:flex; gap:16px; margin:24px 0;">
            <div style="flex:1; padding:16px; background:#f9fafc; border-radius:12px;">
                <p style="margin:0; font-size:13px; color:#6b7280;">Previous Status</p>
                <p class="badge" style="background:#94a3b8; margin-top:8px;">{{ ucfirst(str_replace('_', ' ', $oldStatus)) }}</p>
            </div>
            <div style="flex:1; padding:16px; background:#f0fbfd; border-radius:12px;">
                <p style="margin:0; font-size:13px; color:#6b7280;">New Status</p>
                <p class="badge" style="margin-top:8px;">{{ ucfirst(str_replace('_', ' ', $newStatus)) }}</p>
            </div>
        </div>

        <p>Project Manager: {{ $project->assignedTo?->name ?? 'Not Assigned' }}</p>
        <p>Client: {{ $project->client?->name ?? 'N/A' }}</p>

        <p class="muted">This is an automated notification from Tech Buds CRM.</p>
    </div>
</body>
</html>

