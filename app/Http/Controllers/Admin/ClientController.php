<?php

namespace App\Http\Controllers\Admin;

use App\Events\ClientStatusChanged;
use App\Http\Controllers\Controller;
use App\Models\Admin;
use App\Models\Client;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;
use Illuminate\Validation\ValidationException;

class ClientController extends Controller
{
    /**
     * Display a listing of the clients.
     */
    public function index(Request $request)
    {
        // Check permission
        $admin = auth()->guard('admin')->user();
        if ($admin->email !== 'admin@techbuds.online' && !$admin->can('clients.list')) {
            abort(403, 'You do not have permission to view clients.');
        }

        $query = Client::with('creator', 'projects');

        // Search functionality
        if ($request->has('search') && $request->search) {
            $query->where(function($q) use ($request) {
                $q->where('name', 'like', '%' . $request->search . '%')
                  ->orWhere('email', 'like', '%' . $request->search . '%')
                  ->orWhere('phone', 'like', '%' . $request->search . '%')
                  ->orWhere('company', 'like', '%' . $request->search . '%');
            });
        }

        // Filter by status
        if ($request->has('status') && $request->status !== '') {
            $query->where('status', $request->status);
        }

        $clients = $query->orderBy('created_at', 'desc')->paginate(15);
        
        $statuses = [
            'discovery',
            'proposal_sent',
            'proposal_accepted',
            'onboarding',
            'project_started',
            'in_development',
            'in_testing',
            'invoice_sent',
            'paid',
            'offboarding',
            'completed',
            'archived'
        ];

        return view('admin.clients.index', compact('clients', 'statuses'));
    }

    /**
     * Show the form for creating a new client.
     */
    public function create()
    {
        // Check permission
        $admin = auth()->guard('admin')->user();
        if ($admin->email !== 'admin@techbuds.online' && !$admin->can('clients.create')) {
            abort(403, 'You do not have permission to create clients.');
        }

        return view('admin.clients.create');
    }

    /**
     * Store a newly created client in storage.
     */
    public function store(Request $request)
    {
        // Check permission
        $admin = auth()->guard('admin')->user();
        if ($admin->email !== 'admin@techbuds.online' && !$admin->can('clients.create')) {
            abort(403, 'You do not have permission to create clients.');
        }

        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:clients,email',
            'phone' => 'nullable|string|max:255',
            'company' => 'nullable|string|max:255',
            'status' => 'required|in:discovery,proposal_sent,proposal_accepted,onboarding,project_started,in_development,in_testing,invoice_sent,paid,offboarding,completed,archived',
            'notes' => 'nullable|string',
            'address' => 'nullable|string|max:255',
            'city' => 'nullable|string|max:255',
            'state' => 'nullable|string|max:255',
            'country' => 'nullable|string|max:255',
            'postal_code' => 'nullable|string|max:255',
            'website' => 'nullable|url|max:255',
        ]);

        $validated['created_by'] = $admin->id;

        $client = Client::create($validated);

        // Log activity
        $this->logActivity($client, 'client_created', "Client '{$client->name}' created");

        return redirect()->route('admin.clients.index')
            ->with('success', 'Client created successfully.');
    }

    /**
     * Display the specified client.
     */
    public function show(Client $client)
    {
        // Check permission
        $admin = auth()->guard('admin')->user();
        if ($admin->email !== 'admin@techbuds.online' && !$admin->can('clients.list')) {
            abort(403, 'You do not have permission to view clients.');
        }

        $client->load(['projects', 'creator', 'activityLogs' => function($query) {
            $query->latest()->limit(10);
        }]);

        return view('admin.clients.show', compact('client'));
    }

    /**
     * Show the form for editing the specified client.
     */
    public function edit(Client $client)
    {
        // Check permission
        $admin = auth()->guard('admin')->user();
        if ($admin->email !== 'admin@techbuds.online' && !$admin->can('clients.update')) {
            abort(403, 'You do not have permission to edit clients.');
        }

        return view('admin.clients.edit', compact('client'));
    }

    /**
     * Update the specified client in storage.
     */
    public function update(Request $request, Client $client)
    {
        // Check permission
        $admin = auth()->guard('admin')->user();
        if ($admin->email !== 'admin@techbuds.online' && !$admin->can('clients.update')) {
            abort(403, 'You do not have permission to update clients.');
        }

        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'email' => ['required', 'string', 'email', 'max:255', Rule::unique('clients')->ignore($client->id)],
            'phone' => 'nullable|string|max:255',
            'company' => 'nullable|string|max:255',
            'status' => 'required|in:discovery,proposal_sent,proposal_accepted,onboarding,project_started,in_development,in_testing,invoice_sent,paid,offboarding,completed,archived',
            'notes' => 'nullable|string',
            'address' => 'nullable|string|max:255',
            'city' => 'nullable|string|max:255',
            'state' => 'nullable|string|max:255',
            'country' => 'nullable|string|max:255',
            'postal_code' => 'nullable|string|max:255',
            'website' => 'nullable|url|max:255',
        ]);

        $client->update($validated);

        // Log activity
        $this->logActivity($client, 'client_updated', "Client '{$client->name}' updated");

        return redirect()->route('admin.clients.index')
            ->with('success', 'Client updated successfully.');
    }

    /**
     * Remove the specified client from storage.
     */
    public function destroy(Client $client)
    {
        // Check permission
        $admin = auth()->guard('admin')->user();
        if ($admin->email !== 'admin@techbuds.online' && !$admin->can('clients.delete')) {
            abort(403, 'You do not have permission to delete clients.');
        }

        $name = $client->name;
        $clientId = $client->id;
        $client->delete();

        // Log activity
        \App\Models\ActivityLog::create([
            'user_id' => auth()->guard('admin')->id(),
            'client_id' => $clientId,
            'action' => 'client_deleted',
            'description' => "Client '{$name}' deleted",
            'ip_address' => request()->ip(),
            'user_agent' => request()->userAgent(),
        ]);

        return redirect()->route('admin.clients.index')
            ->with('success', 'Client deleted successfully.');
    }

    /**
     * Update client status.
     */
    public function updateStatus(Request $request, Client $client)
    {
        // Check permission
        $admin = auth()->guard('admin')->user();
        if ($admin->email !== 'admin@techbuds.online' && !$admin->can('clients.update')) {
            // Return JSON error for AJAX requests
            if ($request->expectsJson() || $request->wantsJson() || $request->ajax() || $request->header('X-Requested-With') === 'XMLHttpRequest') {
                return response()->json([
                    'success' => false,
                    'message' => 'You do not have permission to update client status.',
                ], 403);
            }
            abort(403, 'You do not have permission to update client status.');
        }

        try {
            $validated = $request->validate([
                'status' => 'required|in:discovery,proposal_sent,proposal_accepted,onboarding,project_started,in_development,in_testing,invoice_sent,paid,offboarding,completed,archived',
            ]);
        } catch (\Illuminate\Validation\ValidationException $e) {
            // Return JSON error for AJAX requests
            if ($request->expectsJson() || $request->wantsJson() || $request->ajax()) {
                return response()->json([
                    'success' => false,
                    'message' => 'Validation failed',
                    'errors' => $e->errors(),
                ], 422);
            }
            throw $e;
        }

        $oldStatus = $client->status;
        $client->update(['status' => $validated['status']]);

        // Log activity
        $this->logActivity($client, 'client_status_changed', "Client status changed from " . ucfirst(str_replace('_', ' ', $oldStatus)) . " to " . ucfirst(str_replace('_', ' ', $client->status)));

        if ($oldStatus !== $client->status) {
            event(new ClientStatusChanged($client->fresh(), $oldStatus, $client->status));
        }

        // Return JSON response for AJAX requests (pipeline drag & drop)
        if ($request->expectsJson() || $request->wantsJson() || $request->ajax() || $request->header('X-Requested-With') === 'XMLHttpRequest') {
            return response()->json([
                'success' => true,
                'message' => 'Client status updated successfully.',
            ]);
        }

        return redirect()->back()
            ->with('success', 'Client status updated successfully.');
    }

    /**
     * Log activity for the client.
     */
    private function logActivity(Client $client, string $action, string $description)
    {
        \App\Models\ActivityLog::create([
            'user_id' => auth()->guard('admin')->id(),
            'client_id' => $client->id,
            'action' => $action,
            'description' => $description,
            'ip_address' => request()->ip(),
            'user_agent' => request()->userAgent(),
        ]);
    }
}
