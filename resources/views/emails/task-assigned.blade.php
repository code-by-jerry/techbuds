<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <style>
        body { font-family: Arial, sans-serif; background: #f5f7fb; padding: 24px; color: #11224E; }
        .card { max-width: 600px; margin: 0 auto; background: #ffffff; border-radius: 16px; padding: 32px; border: 1px solid #e5e7ef; }
        .muted { color: #6b7280; font-size: 13px; margin-top: 24px; }
        .badge { display: inline-block; padding: 6px 14px; border-radius: 9999px; background: #088395; color: #ffffff; text-transform: capitalize; font-size: 12px; }
    </style>
</head>
<body>
    <div class="card">
        <h2 style="margin-bottom: 8px;">Task {{ $isUpdate ? 'Updated' : 'Assigned' }}</h2>
        <p>Hello {{ $assignee->name }},</p>
        <p>You have been {{ $isUpdate ? 'updated on' : 'assigned to' }} the following task:</p>

        <div style="margin: 20px 0; padding: 16px; background: #f0fbfd; border-radius: 12px;">
            <p style="margin: 0;"><strong>Task:</strong> {{ $task->title }}</p>
            <p style="margin: 6px 0 0;"><strong>Project:</strong> {{ $task->project?->title ?? 'N/A' }}</p>
            <p style="margin: 6px 0 0;"><strong>Status:</strong> <span class="badge">{{ ucfirst(str_replace('_', ' ', $task->status)) }}</span></p>
            @if($task->due_date)
                <p style="margin: 6px 0 0;"><strong>Due:</strong> {{ $task->due_date->format('M d, Y') }}</p>
            @endif
        </div>

        @if($task->description)
            <p><strong>Description:</strong></p>
            <p style="background:#f9fafc; padding:12px; border-radius:8px;">{{ $task->description }}</p>
        @endif

        <p class="muted">Tech Buds Task Notification</p>
    </div>
</body>
</html>

