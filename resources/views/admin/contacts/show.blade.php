@extends('admin.layouts.tailadmin')

@section('title', 'Contact Request Details')

@section('content')
<div class="space-y-6">
    <!-- Header -->
    <div class="flex flex-col gap-4 sm:flex-row sm:items-center sm:justify-between">
        <div>
            <div class="flex items-center gap-3">
                <a href="{{ route('admin.contacts.index') }}" class="text-brand-primary hover:text-brand-soft transition-colors">
                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 19l-7-7m0 0l7-7m-7 7h18" />
                    </svg>
                </a>
                <h2 class="text-2xl font-bold text-heading">Contact Request Details</h2>
            </div>
            <p class="text-sm text-text-secondary mt-1">View and manage contact enquiry details</p>
        </div>
    </div>

    <!-- Contact Details Card -->
    <div class="rounded-2xl border border-border-default bg-surface-1 shadow-sm overflow-hidden">
        <div class="bg-brand-primary/5 px-6 py-4 border-b border-border-default">
            <div class="flex items-center justify-between">
                <div>
                    <h3 class="text-lg font-semibold text-heading">{{ $contact->name }}</h3>
                    <p class="text-sm text-text-secondary mt-1">{{ $contact->email }}</p>
                </div>
                <div class="flex items-center gap-3">
                    @php
                        $statusColors = [
                            'new' => 'bg-brand-primary text-white border-blue-200',
                            'contacted' => 'bg-warning/10 text-warning border-yellow-200',
                            'in_progress' => 'bg-brand-soft/10 text-brand-soft border-purple-200',
                            'completed' => 'bg-green-500/10 text-success border-green-500/20',
                        ];
                        $color = $statusColors[$contact->status] ?? 'bg-surface-2 text-text-secondary border-border-default';
                    @endphp
                    <span class="inline-flex items-center rounded-full border px-3 py-1 text-xs font-medium {{ $color }}">
                        {{ ucfirst(str_replace('_', ' ', $contact->status)) }}
                    </span>
                    @if($contact->nda_requested)
                    <span class="inline-flex items-center gap-1 rounded-full bg-warning/10 border border-orange-200 px-3 py-1 text-xs font-medium text-warning">
                        <svg class="w-3 h-3" fill="currentColor" viewBox="0 0 20 20">
                            <path fill-rule="evenodd" d="M5 9V7a5 5 0 0110 0v2a2 2 0 012 2v5a2 2 0 01-2 2H5a2 2 0 01-2-2v-5a2 2 0 012-2zm8-2v2H7V7a3 3 0 016 0z" clip-rule="evenodd" />
                        </svg>
                        NDA Requested
                    </span>
                    @endif
                </div>
            </div>
        </div>

        <div class="p-6 space-y-6">
            <!-- Contact Information -->
            <div>
                <h4 class="text-sm font-semibold text-heading mb-4 uppercase tracking-wide">Contact Information</h4>
                <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                    <div>
                        <label class="text-xs font-medium text-text-secondary uppercase">Name</label>
                        <p class="mt-1 text-sm text-heading">{{ $contact->name }}</p>
                    </div>
                    <div>
                        <label class="text-xs font-medium text-text-secondary uppercase">Email</label>
                        <p class="mt-1 text-sm text-heading">
                            <a href="mailto:{{ $contact->email }}" class="text-brand-primary hover:text-brand-soft transition-colors">
                                {{ $contact->email }}
                            </a>
                        </p>
                    </div>
                    @if($contact->phone)
                    <div>
                        <label class="text-xs font-medium text-text-secondary uppercase">Phone</label>
                        <p class="mt-1 text-sm text-heading">
                            <a href="tel:{{ $contact->phone }}" class="text-brand-primary hover:text-brand-soft transition-colors">
                                {{ $contact->phone }}
                            </a>
                        </p>
                    </div>
                    @endif
                    @if($contact->project_type)
                    <div>
                        <label class="text-xs font-medium text-text-secondary uppercase">Project Type</label>
                        <p class="mt-1 text-sm text-heading">{{ $contact->project_type }}</p>
                    </div>
                    @endif
                    <div>
                        <label class="text-xs font-medium text-text-secondary uppercase">Submitted</label>
                        <p class="mt-1 text-sm text-heading">{{ $contact->created_at->format('F d, Y \a\t h:i A') }}</p>
                    </div>
                </div>
            </div>

            <!-- Message -->
            @if($contact->message)
            <div>
                <h4 class="text-sm font-semibold text-heading mb-4 uppercase tracking-wide">Message</h4>
                <div class="rounded-lg bg-brand-primary/5 p-4">
                    <p class="text-sm text-heading whitespace-pre-wrap">{{ $contact->message }}</p>
                </div>
            </div>
            @endif

            <!-- Notes -->
            @if($contact->notes)
            <div>
                <h4 class="text-sm font-semibold text-heading mb-4 uppercase tracking-wide">Admin Notes</h4>
                <div class="rounded-lg bg-yellow-50 border border-yellow-200 p-4">
                    <p class="text-sm text-yellow-900 whitespace-pre-wrap">{{ $contact->notes }}</p>
                </div>
            </div>
            @endif
        </div>

        <!-- Actions -->
        <div class="bg-brand-primary/5 px-6 py-4 border-t border-border-default flex items-center justify-between">
            <div class="text-sm text-text-secondary">
                Last updated: {{ $contact->updated_at->format('F d, Y \a\t h:i A') }}
            </div>
            <div class="flex items-center gap-3">
                <a href="mailto:{{ $contact->email }}" class="inline-flex items-center gap-2 rounded-lg bg-brand-primary px-4 py-2 text-sm font-medium text-white transition-colors hover:bg-brand-hover">
                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z" />
                    </svg>
                    Reply via Email
                </a>
            </div>
        </div>
    </div>
</div>
@endsection

