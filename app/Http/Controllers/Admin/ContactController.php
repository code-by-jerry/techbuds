<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Contact;
use Illuminate\Http\Request;

class ContactController extends Controller
{
    /**
     * Display a listing of the contacts.
     */
    public function index(Request $request)
    {
        // Check permission
        $admin = auth()->guard('admin')->user();
        if ($admin->email !== 'admin@techbuds.online' && !$admin->can('contacts.list')) {
            abort(403, 'You do not have permission to view contacts.');
        }

        $query = Contact::query();

        // Search functionality
        if ($request->has('search') && $request->search) {
            $query->where(function($q) use ($request) {
                $q->where('name', 'like', '%' . $request->search . '%')
                  ->orWhere('email', 'like', '%' . $request->search . '%')
                  ->orWhere('phone', 'like', '%' . $request->search . '%')
                  ->orWhere('project_type', 'like', '%' . $request->search . '%')
                  ->orWhere('message', 'like', '%' . $request->search . '%');
            });
        }

        // Filter by status
        if ($request->has('status') && $request->status !== '') {
            $query->where('status', $request->status);
        }

        // Filter by NDA requested
        if ($request->has('nda') && $request->nda !== '') {
            $query->where('nda_requested', $request->nda === '1');
        }

        $contacts = $query->orderBy('created_at', 'desc')->paginate(15);
        $statuses = ['new', 'contacted', 'in_progress', 'completed'];

        return view('admin.contacts.index', compact('contacts', 'statuses'));
    }

    /**
     * Display the specified contact.
     */
    public function show(Contact $contact)
    {
        // Check permission (viewing is considered list permission)
        $admin = auth()->guard('admin')->user();
        if ($admin->email !== 'admin@techbuds.online' && !$admin->can('contacts.list')) {
            abort(403, 'You do not have permission to view contacts.');
        }

        return view('admin.contacts.show', compact('contact'));
    }
}
