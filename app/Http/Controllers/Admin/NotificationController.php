<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Notification;
use Illuminate\Http\Request;

class NotificationController extends Controller
{
    /**
     * Get all notifications
     */
    public function index()
    {
        $notifications = Notification::orderBy('created_at', 'desc')
            ->limit(50)
            ->get();
        
        $unreadCount = Notification::unreadCount();

        return response()->json([
            'notifications' => $notifications,
            'unread_count' => $unreadCount,
        ]);
    }

    /**
     * Mark a notification as read
     */
    public function markAsRead(Notification $notification)
    {
        $notification->markAsRead();

        return response()->json([
            'success' => true,
            'unread_count' => Notification::unreadCount(),
        ]);
    }

    /**
     * Mark all notifications as read
     */
    public function markAllAsRead()
    {
        Notification::markAllAsRead();

        return response()->json([
            'success' => true,
            'unread_count' => 0,
        ]);
    }
}
