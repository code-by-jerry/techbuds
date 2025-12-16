<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Notification extends Model
{
    protected $fillable = [
        'type',
        'title',
        'message',
        'link',
        'is_read',
    ];

    protected $casts = [
        'is_read' => 'boolean',
    ];

    /**
     * Mark notification as read
     */
    public function markAsRead()
    {
        $this->update(['is_read' => true]);
    }

    /**
     * Mark all notifications as read
     */
    public static function markAllAsRead()
    {
        return static::where('is_read', false)->update(['is_read' => true]);
    }

    /**
     * Get unread notifications count
     */
    public static function unreadCount()
    {
        return static::where('is_read', false)->count();
    }
}
