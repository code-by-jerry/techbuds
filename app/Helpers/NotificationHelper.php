<?php

namespace App\Helpers;

use App\Models\Notification;
use App\Models\User;
use App\Mail\NewUserNotification;
use Illuminate\Support\Facades\Mail;

class NotificationHelper
{
    /**
     * Create a notification for a new user registration
     */
    public static function notifyNewUser(User $user)
    {
        // Create admin notification
        Notification::create([
            'type' => 'new_user',
            'title' => 'New User Registration',
            'message' => $user->name . ' has registered',
            'link' => url('/admin/users'), // Update this route when you create user management
            'is_read' => false,
        ]);

        // Send email notification
        try {
            Mail::to('admin@techbuds.online')->send(new NewUserNotification($user));
        } catch (\Exception $e) {
            // Log error but don't fail the request
            \Log::error('Failed to send new user notification email: ' . $e->getMessage());
        }
    }

    /**
     * Create a notification for a new contact request
     */
    public static function notifyNewContact($contact)
    {
        // This is already handled in ContactController, but kept here for consistency
        Notification::create([
            'type' => 'contact_request',
            'title' => 'New Contact Request',
            'message' => $contact->name . ' submitted a contact request',
            'link' => route('admin.contacts.show', $contact),
            'is_read' => false,
        ]);

        try {
            Mail::to('admin@techbuds.online')->send(new \App\Mail\ContactNotification($contact));
        } catch (\Exception $e) {
            \Log::error('Failed to send contact notification email: ' . $e->getMessage());
        }
    }
}

