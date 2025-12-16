<?php

namespace App\Http\Controllers;

use App\Mail\ContactNotification;
use App\Models\Contact;
use App\Models\Notification;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Validator;

class ContactController extends Controller
{
    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'name' => 'required|string|max:255',
            'email' => 'required|email|max:255',
            'phone' => 'nullable|string|max:20',
            'project_type' => 'nullable|string|max:255',
            'message' => 'nullable|string|max:2000',
            'nda' => 'nullable|boolean',
        ]);

        if ($validator->fails()) {
            return back()
                ->withErrors($validator)
                ->withInput()
                ->with('error', 'Please check the form and try again.');
        }

        $contact = Contact::create([
            'name' => $request->name,
            'email' => $request->email,
            'phone' => $request->phone,
            'project_type' => $request->project_type,
            'message' => $request->message,
            'nda_requested' => $request->has('nda') ? true : false,
            'status' => 'new',
        ]);

        // Create notification
        Notification::create([
            'type' => 'contact_request',
            'title' => 'New Contact Request',
            'message' => $contact->name . ' submitted a contact request',
            'link' => route('admin.contacts.show', $contact),
            'is_read' => false,
        ]);

        // Send email notification
        try {
            Mail::to('admin@techbuds.online')->send(new ContactNotification($contact));
        } catch (\Exception $e) {
            // Log error but don't fail the request
            \Log::error('Failed to send contact notification email: ' . $e->getMessage());
        }

        return back()->with('success', 'Thank you! We\'ve received your message and will get back to you soon.');
    }
}
