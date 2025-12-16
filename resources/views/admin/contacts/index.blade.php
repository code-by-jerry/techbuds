@extends('admin.layouts.tailadmin')

@section('title', 'Contact Requests')

@section('content')
<div class="space-y-6">
    <!-- Header -->
    <div class="flex flex-col gap-4 sm:flex-row sm:items-center sm:justify-between">
        <div>
            <h2 class="text-2xl font-bold text-[#11224E]">Contact Requests</h2>
            <p class="text-sm text-[#088395]/70 mt-1">Manage contact enquiries and requests</p>
        </div>
    </div>

    <!-- Success/Error Messages -->
    @if(session('success'))
    <div class="rounded-lg border border-green-200 bg-green-50 px-4 py-3 text-sm text-green-800">
        {{ session('success') }}
    </div>
    @endif

    @if($errors->any())
    <div class="rounded-lg border border-red-200 bg-red-50 px-4 py-3 text-sm text-red-800">
        <ul class="list-disc list-inside">
            @foreach($errors->all() as $error)
            <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
    @endif

    <!-- Filters and Search -->
    <div class="rounded-2xl border border-[#088395]/10 bg-white p-4 shadow-sm">
        <form method="GET" action="{{ route('admin.contacts.index') }}" class="flex flex-col gap-4 sm:flex-row sm:items-end">
            <!-- Search -->
            <div class="flex-1">
                <label class="mb-1 block text-xs font-medium text-[#11224E]">Search</label>
                <input
                    type="text"
                    name="search"
                    value="{{ request('search') }}"
                    placeholder="Search by name, email, phone, or message..."
                    class="w-full rounded-lg border border-[#088395]/15 px-3 py-2 text-sm text-[#11224E] focus:border-[#088395] focus:outline-none focus:ring-2 focus:ring-[#088395]/20"
                />
            </div>

            <!-- Status Filter -->
            <div class="sm:w-48">
                <label class="mb-1 block text-xs font-medium text-[#11224E]">Status</label>
                <select
                    name="status"
                    class="w-full rounded-lg border border-[#088395]/15 px-3 py-2 text-sm text-[#11224E] focus:border-[#088395] focus:outline-none focus:ring-2 focus:ring-[#088395]/20"
                >
                    <option value="">All Status</option>
                    @foreach($statuses as $status)
                    <option value="{{ $status }}" {{ request('status') === $status ? 'selected' : '' }}>
                        {{ ucfirst(str_replace('_', ' ', $status)) }}
                    </option>
                    @endforeach
                </select>
            </div>

            <!-- NDA Filter -->
            <div class="sm:w-48">
                <label class="mb-1 block text-xs font-medium text-[#11224E]">NDA Requested</label>
                <select
                    name="nda"
                    class="w-full rounded-lg border border-[#088395]/15 px-3 py-2 text-sm text-[#11224E] focus:border-[#088395] focus:outline-none focus:ring-2 focus:ring-[#088395]/20"
                >
                    <option value="">All</option>
                    <option value="1" {{ request('nda') === '1' ? 'selected' : '' }}>Yes</option>
                    <option value="0" {{ request('nda') === '0' ? 'selected' : '' }}>No</option>
                </select>
            </div>

            <!-- Submit Button -->
            <div>
                <button type="submit" class="rounded-lg bg-[#088395] px-4 py-2 text-sm font-medium text-white transition-colors hover:bg-[#37B7C3]">
                    Filter
                </button>
            </div>

            <!-- Clear Filters -->
            @if(request('search') || request('status') || request('nda'))
            <div>
                <a href="{{ route('admin.contacts.index') }}" class="inline-block rounded-lg border border-[#088395]/20 px-4 py-2 text-sm font-medium text-[#088395] transition-colors hover:bg-[#088395]/5">
                    Clear
                </a>
            </div>
            @endif
        </form>
    </div>

    <!-- Contacts Table -->
    <div class="overflow-hidden rounded-2xl border border-[#088395]/10 bg-white shadow-sm">
        <div class="overflow-x-auto">
            <table class="w-full">
                <thead class="bg-[#088395]/5">
                    <tr>
                        <th class="px-6 py-3 text-left text-xs font-semibold uppercase tracking-wider text-[#11224E]">Name</th>
                        <th class="px-6 py-3 text-left text-xs font-semibold uppercase tracking-wider text-[#11224E]">Email</th>
                        <th class="px-6 py-3 text-left text-xs font-semibold uppercase tracking-wider text-[#11224E]">Phone</th>
                        <th class="px-6 py-3 text-left text-xs font-semibold uppercase tracking-wider text-[#11224E]">Project Type</th>
                        <th class="px-6 py-3 text-left text-xs font-semibold uppercase tracking-wider text-[#11224E]">Status</th>
                        <th class="px-6 py-3 text-left text-xs font-semibold uppercase tracking-wider text-[#11224E]">Date</th>
                        <th class="px-6 py-3 text-right text-xs font-semibold uppercase tracking-wider text-[#11224E]">Actions</th>
                    </tr>
                </thead>
                <tbody class="divide-y divide-[#088395]/10 bg-white">
                    @forelse($contacts as $contact)
                    <tr class="hover:bg-[#088395]/2 transition-colors">
                        <td class="px-6 py-4">
                            <div class="font-medium text-[#11224E]">{{ $contact->name }}</div>
                            @if($contact->nda_requested)
                            <span class="inline-flex items-center gap-1 mt-1 text-xs text-orange-600">
                                <svg class="w-3 h-3" fill="currentColor" viewBox="0 0 20 20">
                                    <path fill-rule="evenodd" d="M5 9V7a5 5 0 0110 0v2a2 2 0 012 2v5a2 2 0 01-2 2H5a2 2 0 01-2-2v-5a2 2 0 012-2zm8-2v2H7V7a3 3 0 016 0z" clip-rule="evenodd" />
                                </svg>
                                NDA Requested
                            </span>
                            @endif
                        </td>
                        <td class="px-6 py-4 text-sm text-[#088395]/70">
                            <a href="mailto:{{ $contact->email }}" class="hover:text-[#088395] transition-colors">
                                {{ $contact->email }}
                            </a>
                        </td>
                        <td class="px-6 py-4 text-sm text-[#088395]/70">
                            {{ $contact->phone ?? 'N/A' }}
                        </td>
                        <td class="px-6 py-4">
                            @if($contact->project_type)
                            <span class="inline-flex items-center rounded-full bg-[#088395]/10 px-2.5 py-0.5 text-xs font-medium text-[#088395]">
                                {{ $contact->project_type }}
                            </span>
                            @else
                            <span class="text-xs text-[#088395]/50">N/A</span>
                            @endif
                        </td>
                        <td class="px-6 py-4">
                            @php
                                $statusColors = [
                                    'new' => 'bg-blue-50 text-blue-600',
                                    'contacted' => 'bg-yellow-50 text-yellow-600',
                                    'in_progress' => 'bg-purple-50 text-purple-600',
                                    'completed' => 'bg-green-50 text-green-600',
                                ];
                                $color = $statusColors[$contact->status] ?? 'bg-gray-50 text-gray-600';
                            @endphp
                            <span class="inline-flex items-center rounded-full px-2.5 py-0.5 text-xs font-medium {{ $color }}">
                                {{ ucfirst(str_replace('_', ' ', $contact->status)) }}
                            </span>
                        </td>
                        <td class="px-6 py-4 text-sm text-[#088395]/70">
                            {{ $contact->created_at->format('M d, Y') }}
                        </td>
                        <td class="px-6 py-4 text-right text-sm font-medium">
                            <a href="{{ route('admin.contacts.show', $contact) }}" class="text-[#088395] hover:text-[#37B7C3] transition-colors" title="View">
                                <svg class="h-5 w-5 inline" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z" />
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z" />
                                </svg>
                            </a>
                        </td>
                    </tr>
                    @empty
                    <tr>
                        <td colspan="7" class="px-6 py-12 text-center">
                            <div class="mx-auto max-w-sm">
                                <svg class="mx-auto h-12 w-12 text-[#088395]/30" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z" />
                                </svg>
                                <h3 class="mt-4 text-sm font-medium text-[#11224E]">No contact requests found</h3>
                                <p class="mt-2 text-sm text-[#088395]/70">No contact requests match your search criteria.</p>
                            </div>
                        </td>
                    </tr>
                    @endforelse
                </tbody>
            </table>
        </div>

        <!-- Pagination -->
        @if($contacts->hasPages())
        <div class="border-t border-[#088395]/10 px-6 py-4">
            <div class="flex flex-col gap-4 sm:flex-row sm:items-center sm:justify-between">
                <div class="text-sm text-[#088395]/70">
                    Showing {{ $contacts->firstItem() ?? 0 }} to {{ $contacts->lastItem() ?? 0 }} of {{ $contacts->total() }} results
                </div>
                <div class="flex items-center gap-2">
                    @if($contacts->onFirstPage())
                    <span class="rounded-lg border border-[#088395]/20 px-3 py-1.5 text-sm text-[#088395]/40 cursor-not-allowed">Previous</span>
                    @else
                    <a href="{{ $contacts->appends(request()->query())->previousPageUrl() }}" class="rounded-lg border border-[#088395]/20 px-3 py-1.5 text-sm text-[#088395] transition-colors hover:bg-[#088395]/5">Previous</a>
                    @endif

                    @php
                        $currentPage = $contacts->currentPage();
                        $lastPage = $contacts->lastPage();
                        $startPage = max(1, $currentPage - 2);
                        $endPage = min($lastPage, $currentPage + 2);
                    @endphp

                    @for($page = $startPage; $page <= $endPage; $page++)
                        @if($page == $currentPage)
                        <span class="rounded-lg bg-[#088395] px-3 py-1.5 text-sm font-medium text-white">{{ $page }}</span>
                        @else
                        <a href="{{ $contacts->appends(request()->query())->url($page) }}" class="rounded-lg border border-[#088395]/20 px-3 py-1.5 text-sm text-[#088395] transition-colors hover:bg-[#088395]/5">{{ $page }}</a>
                        @endif
                    @endfor

                    @if($contacts->hasMorePages())
                    <a href="{{ $contacts->appends(request()->query())->nextPageUrl() }}" class="rounded-lg border border-[#088395]/20 px-3 py-1.5 text-sm text-[#088395] transition-colors hover:bg-[#088395]/5">Next</a>
                    @else
                    <span class="rounded-lg border border-[#088395]/20 px-3 py-1.5 text-sm text-[#088395]/40 cursor-not-allowed">Next</span>
                    @endif
                </div>
            </div>
        </div>
        @endif
    </div>
</div>
@endsection

