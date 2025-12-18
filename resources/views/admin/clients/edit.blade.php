@extends('admin.layouts.tailadmin')

@section('title', 'Edit Client')

@section('content')
<div class="space-y-6">
    <!-- Header -->
    <div class="flex items-center justify-between">
        <div>
            <div class="flex items-center gap-3">
                <a href="{{ route('admin.clients.show', $client) }}" class="text-brand-primary hover:text-brand-soft transition-colors">
                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 19l-7-7m0 0l7-7m-7 7h18" />
                    </svg>
                </a>
                <h2 class="text-2xl font-bold text-heading">Edit Client</h2>
            </div>
            <p class="text-sm text-text-secondary mt-1">Update client information</p>
        </div>
    </div>

    <!-- Form -->
    <form action="{{ route('admin.clients.update', $client) }}" method="POST" class="space-y-6">
        @csrf
        @method('PUT')

        <div class="rounded-2xl border border-border-default bg-surface-1 p-6 shadow-sm">
            <h3 class="mb-4 text-lg font-semibold text-heading">Client Information</h3>
            <div class="grid grid-cols-1 gap-4 md:grid-cols-2">
                <!-- Name -->
                <div class="md:col-span-2">
                    <label for="name" class="mb-1 block text-sm font-medium text-heading">Name <span class="text-red-500">*</span></label>
                    <input
                        type="text"
                        id="name"
                        name="name"
                        value="{{ old('name', $client->name) }}"
                        required
                        class="w-full rounded-lg border border-border-default bg-surface-2 px-3 py-2 text-sm text-heading focus:border-brand-primary focus:outline-none focus:ring-2 focus:ring-brand-primary/20"
                    />
                    @error('name')
                    <p class="mt-1 text-xs text-error">{{ $message }}</p>
                    @enderror
                </div>

                <!-- Email -->
                <div>
                    <label for="email" class="mb-1 block text-sm font-medium text-heading">Email <span class="text-red-500">*</span></label>
                    <input
                        type="email"
                        id="email"
                        name="email"
                        value="{{ old('email', $client->email) }}"
                        required
                        class="w-full rounded-lg border border-border-default bg-surface-2 px-3 py-2 text-sm text-heading focus:border-brand-primary focus:outline-none focus:ring-2 focus:ring-brand-primary/20"
                    />
                    @error('email')
                    <p class="mt-1 text-xs text-error">{{ $message }}</p>
                    @enderror
                </div>

                <!-- Phone -->
                <div>
                    <label for="phone" class="mb-1 block text-sm font-medium text-heading">Phone</label>
                    <input
                        type="text"
                        id="phone"
                        name="phone"
                        value="{{ old('phone', $client->phone) }}"
                        class="w-full rounded-lg border border-border-default bg-surface-2 px-3 py-2 text-sm text-heading focus:border-brand-primary focus:outline-none focus:ring-2 focus:ring-brand-primary/20"
                    />
                    @error('phone')
                    <p class="mt-1 text-xs text-error">{{ $message }}</p>
                    @enderror
                </div>

                <!-- Company -->
                <div>
                    <label for="company" class="mb-1 block text-sm font-medium text-heading">Company</label>
                    <input
                        type="text"
                        id="company"
                        name="company"
                        value="{{ old('company', $client->company) }}"
                        class="w-full rounded-lg border border-border-default bg-surface-2 px-3 py-2 text-sm text-heading focus:border-brand-primary focus:outline-none focus:ring-2 focus:ring-brand-primary/20"
                    />
                    @error('company')
                    <p class="mt-1 text-xs text-error">{{ $message }}</p>
                    @enderror
                </div>

                <!-- Website -->
                <div>
                    <label for="website" class="mb-1 block text-sm font-medium text-heading">Website</label>
                    <input
                        type="url"
                        id="website"
                        name="website"
                        value="{{ old('website', $client->website) }}"
                        class="w-full rounded-lg border border-border-default bg-surface-2 px-3 py-2 text-sm text-heading focus:border-brand-primary focus:outline-none focus:ring-2 focus:ring-brand-primary/20"
                    />
                    @error('website')
                    <p class="mt-1 text-xs text-error">{{ $message }}</p>
                    @enderror
                </div>

                <!-- Status -->
                <div>
                    <label for="status" class="mb-1 block text-sm font-medium text-heading">Status <span class="text-red-500">*</span></label>
                    <select
                        id="status"
                        name="status"
                        required
                        class="w-full rounded-lg border border-border-default bg-surface-2 px-3 py-2 text-sm text-heading focus:border-brand-primary focus:outline-none focus:ring-2 focus:ring-brand-primary/20"
                    >
                        <option value="discovery" {{ old('status', $client->status) === 'discovery' ? 'selected' : '' }}>Discovery</option>
                        <option value="proposal_sent" {{ old('status', $client->status) === 'proposal_sent' ? 'selected' : '' }}>Proposal Sent</option>
                        <option value="proposal_accepted" {{ old('status', $client->status) === 'proposal_accepted' ? 'selected' : '' }}>Proposal Accepted</option>
                        <option value="onboarding" {{ old('status', $client->status) === 'onboarding' ? 'selected' : '' }}>Onboarding</option>
                        <option value="project_started" {{ old('status', $client->status) === 'project_started' ? 'selected' : '' }}>Project Started</option>
                        <option value="in_development" {{ old('status', $client->status) === 'in_development' ? 'selected' : '' }}>In Development</option>
                        <option value="in_testing" {{ old('status', $client->status) === 'in_testing' ? 'selected' : '' }}>In Testing</option>
                        <option value="invoice_sent" {{ old('status', $client->status) === 'invoice_sent' ? 'selected' : '' }}>Invoice Sent</option>
                        <option value="paid" {{ old('status', $client->status) === 'paid' ? 'selected' : '' }}>Paid</option>
                        <option value="offboarding" {{ old('status', $client->status) === 'offboarding' ? 'selected' : '' }}>Offboarding</option>
                        <option value="completed" {{ old('status', $client->status) === 'completed' ? 'selected' : '' }}>Completed</option>
                        <option value="archived" {{ old('status', $client->status) === 'archived' ? 'selected' : '' }}>Archived</option>
                    </select>
                    @error('status')
                    <p class="mt-1 text-xs text-error">{{ $message }}</p>
                    @enderror
                </div>
            </div>
        </div>

        <!-- Address Information -->
        <div class="rounded-2xl border border-border-default bg-surface-1 p-6 shadow-sm">
            <h3 class="mb-4 text-lg font-semibold text-heading">Address Information</h3>
            <div class="grid grid-cols-1 gap-4 md:grid-cols-2">
                <div class="md:col-span-2">
                    <label for="address" class="mb-1 block text-sm font-medium text-heading">Address</label>
                    <input
                        type="text"
                        id="address"
                        name="address"
                        value="{{ old('address', $client->address) }}"
                        class="w-full rounded-lg border border-border-default bg-surface-2 px-3 py-2 text-sm text-heading focus:border-brand-primary focus:outline-none focus:ring-2 focus:ring-brand-primary/20"
                    />
                    @error('address')
                    <p class="mt-1 text-xs text-error">{{ $message }}</p>
                    @enderror
                </div>

                <div>
                    <label for="city" class="mb-1 block text-sm font-medium text-heading">City</label>
                    <input
                        type="text"
                        id="city"
                        name="city"
                        value="{{ old('city', $client->city) }}"
                        class="w-full rounded-lg border border-border-default bg-surface-2 px-3 py-2 text-sm text-heading focus:border-brand-primary focus:outline-none focus:ring-2 focus:ring-brand-primary/20"
                    />
                    @error('city')
                    <p class="mt-1 text-xs text-error">{{ $message }}</p>
                    @enderror
                </div>

                <div>
                    <label for="state" class="mb-1 block text-sm font-medium text-heading">State/Province</label>
                    <input
                        type="text"
                        id="state"
                        name="state"
                        value="{{ old('state', $client->state) }}"
                        class="w-full rounded-lg border border-border-default bg-surface-2 px-3 py-2 text-sm text-heading focus:border-brand-primary focus:outline-none focus:ring-2 focus:ring-brand-primary/20"
                    />
                    @error('state')
                    <p class="mt-1 text-xs text-error">{{ $message }}</p>
                    @enderror
                </div>

                <div>
                    <label for="country" class="mb-1 block text-sm font-medium text-heading">Country</label>
                    <input
                        type="text"
                        id="country"
                        name="country"
                        value="{{ old('country', $client->country) }}"
                        class="w-full rounded-lg border border-border-default bg-surface-2 px-3 py-2 text-sm text-heading focus:border-brand-primary focus:outline-none focus:ring-2 focus:ring-brand-primary/20"
                    />
                    @error('country')
                    <p class="mt-1 text-xs text-error">{{ $message }}</p>
                    @enderror
                </div>

                <div>
                    <label for="postal_code" class="mb-1 block text-sm font-medium text-heading">Postal Code</label>
                    <input
                        type="text"
                        id="postal_code"
                        name="postal_code"
                        value="{{ old('postal_code', $client->postal_code) }}"
                        class="w-full rounded-lg border border-border-default bg-surface-2 px-3 py-2 text-sm text-heading focus:border-brand-primary focus:outline-none focus:ring-2 focus:ring-brand-primary/20"
                    />
                    @error('postal_code')
                    <p class="mt-1 text-xs text-error">{{ $message }}</p>
                    @enderror
                </div>
            </div>
        </div>

        <!-- Notes -->
        <div class="rounded-2xl border border-border-default bg-surface-1 p-6 shadow-sm">
            <h3 class="mb-4 text-lg font-semibold text-heading">Notes</h3>
            <div>
                <label for="notes" class="mb-1 block text-sm font-medium text-heading">Additional Notes</label>
                <textarea
                    id="notes"
                    name="notes"
                    rows="4"
                    class="w-full rounded-lg border border-border-default bg-surface-2 px-3 py-2 text-sm text-heading focus:border-brand-primary focus:outline-none focus:ring-2 focus:ring-brand-primary/20"
                >{{ old('notes', $client->notes) }}</textarea>
                @error('notes')
                <p class="mt-1 text-xs text-error">{{ $message }}</p>
                @enderror
            </div>
        </div>

        <!-- Form Actions -->
        <div class="flex items-center justify-end gap-3">
            <a href="{{ route('admin.clients.show', $client) }}" class="rounded-lg border border-border-default px-4 py-2 text-sm font-medium text-brand-primary transition-colors hover:bg-brand-primary/5">
                Cancel
            </a>
            <button type="submit" class="rounded-lg bg-brand-primary px-6 py-2 text-sm font-medium text-white transition-colors hover:bg-brand-hover">
                Update Client
            </button>
        </div>
    </form>
</div>
@endsection

