@extends('admin.layouts.tailadmin')

@section('title', 'Client Details')

@section('content')
<div class="space-y-6">
    <!-- Header -->
    <div class="flex flex-col gap-4 sm:flex-row sm:items-center sm:justify-between">
        <div>
            <div class="flex items-center gap-3">
                <a href="{{ route('admin.clients.index') }}" class="text-[#088395] hover:text-[#37B7C3] transition-colors">
                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 19l-7-7m0 0l7-7m-7 7h18" />
                    </svg>
                </a>
                <h2 class="text-2xl font-bold text-[#11224E]">{{ $client->name }}</h2>
            </div>
            <p class="text-sm text-[#088395]/70 mt-1">Client details and information</p>
        </div>
        <div class="flex items-center gap-3">
            <a href="{{ route('admin.clients.edit', $client) }}" class="inline-flex items-center gap-2 rounded-lg border border-[#088395]/20 px-4 py-2 text-sm font-medium text-[#088395] transition-colors hover:bg-[#088395]/5">
                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z" />
                </svg>
                Edit
            </a>
            <a href="{{ route('admin.projects.create', ['client_id' => $client->id]) }}" class="inline-flex items-center gap-2 rounded-lg bg-[#088395] px-4 py-2 text-sm font-medium text-white transition-colors hover:bg-[#37B7C3]">
                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4" />
                </svg>
                New Project
            </a>
        </div>
    </div>

    <!-- Client Details Card -->
    <div class="rounded-2xl border border-[#088395]/10 bg-white shadow-sm overflow-hidden">
        <div class="bg-[#088395]/5 px-6 py-4 border-b border-[#088395]/10">
            <div class="flex items-center justify-between">
                <div>
                    <h3 class="text-lg font-semibold text-[#11224E]">{{ $client->name }}</h3>
                    <p class="text-sm text-[#088395]/70 mt-1">{{ $client->email }}</p>
                </div>
                <div>
                    @php
                        $statusColors = [
                            'discovery' => 'bg-gray-50 text-gray-600 border-gray-200',
                            'proposal_sent' => 'bg-blue-50 text-blue-600 border-blue-200',
                            'proposal_accepted' => 'bg-green-50 text-green-600 border-green-200',
                            'onboarding' => 'bg-orange-50 text-orange-600 border-orange-200',
                            'project_started' => 'bg-purple-50 text-purple-600 border-purple-200',
                            'in_development' => 'bg-indigo-50 text-indigo-600 border-indigo-200',
                            'in_testing' => 'bg-pink-50 text-pink-600 border-pink-200',
                            'invoice_sent' => 'bg-orange-50 text-orange-600 border-orange-200',
                            'paid' => 'bg-green-50 text-green-600 border-green-200',
                            'offboarding' => 'bg-cyan-50 text-cyan-600 border-cyan-200',
                            'completed' => 'bg-slate-50 text-slate-600 border-slate-200',
                            'archived' => 'bg-slate-100 text-slate-700 border-slate-300',
                        ];
                        $color = $statusColors[$client->status] ?? 'bg-gray-50 text-gray-600 border-gray-200';
                    @endphp
                    <span class="inline-flex items-center rounded-full border px-3 py-1 text-xs font-medium {{ $color }}">
                        {{ ucfirst(str_replace('_', ' ', $client->status)) }}
                    </span>
                </div>
            </div>
        </div>

        <div class="p-6 space-y-6">
            <!-- Contact Information -->
            <div>
                <h4 class="text-sm font-semibold text-[#11224E] mb-4 uppercase tracking-wide">Contact Information</h4>
                <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                    <div>
                        <label class="text-xs font-medium text-[#088395]/70 uppercase">Email</label>
                        <p class="mt-1 text-sm text-[#11224E]">
                            <a href="mailto:{{ $client->email }}" class="text-[#088395] hover:text-[#37B7C3] transition-colors">
                                {{ $client->email }}
                            </a>
                        </p>
                    </div>
                    @if($client->phone)
                    <div>
                        <label class="text-xs font-medium text-[#088395]/70 uppercase">Phone</label>
                        <p class="mt-1 text-sm text-[#11224E]">
                            <a href="tel:{{ $client->phone }}" class="text-[#088395] hover:text-[#37B7C3] transition-colors">
                                {{ $client->phone }}
                            </a>
                        </p>
                    </div>
                    @endif
                    @if($client->company)
                    <div>
                        <label class="text-xs font-medium text-[#088395]/70 uppercase">Company</label>
                        <p class="mt-1 text-sm text-[#11224E]">{{ $client->company }}</p>
                    </div>
                    @endif
                    @if($client->website)
                    <div>
                        <label class="text-xs font-medium text-[#088395]/70 uppercase">Website</label>
                        <p class="mt-1 text-sm text-[#11224E]">
                            <a href="{{ $client->website }}" target="_blank" class="text-[#088395] hover:text-[#37B7C3] transition-colors">
                                {{ $client->website }}
                            </a>
                        </p>
                    </div>
                    @endif
                </div>
            </div>

            <!-- Address Information -->
            @if($client->address || $client->city || $client->state || $client->country || $client->postal_code)
            <div>
                <h4 class="text-sm font-semibold text-[#11224E] mb-4 uppercase tracking-wide">Address</h4>
                <div class="text-sm text-[#11224E]">
                    @if($client->address){{ $client->address }}<br>@endif
                    @if($client->city || $client->state || $client->postal_code)
                        {{ $client->city }}{{ $client->city && $client->state ? ', ' : '' }}{{ $client->state }} {{ $client->postal_code }}<br>
                    @endif
                    @if($client->country){{ $client->country }}@endif
                </div>
            </div>
            @endif

            <!-- Notes -->
            @if($client->notes)
            <div>
                <h4 class="text-sm font-semibold text-[#11224E] mb-4 uppercase tracking-wide">Notes</h4>
                <div class="rounded-lg bg-[#088395]/5 p-4">
                    <p class="text-sm text-[#11224E] whitespace-pre-wrap">{{ $client->notes }}</p>
                </div>
            </div>
            @endif

            <!-- Projects -->
            <div>
                <h4 class="text-sm font-semibold text-[#11224E] mb-4 uppercase tracking-wide">Projects ({{ $client->projects->count() }})</h4>
                @if($client->projects->count() > 0)
                <div class="space-y-2">
                    @foreach($client->projects as $project)
                    <a href="{{ route('admin.projects.show', $project) }}" class="block rounded-lg border border-[#088395]/10 bg-white p-4 hover:bg-[#088395]/5 transition-colors">
                        <div class="flex items-center justify-between">
                            <div>
                                <h5 class="font-medium text-[#11224E]">{{ $project->title }}</h5>
                                <p class="text-xs text-[#088395]/70 mt-1">{{ ucfirst(str_replace('_', ' ', $project->status)) }}</p>
                            </div>
                            <svg class="w-5 h-5 text-[#088395]" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7" />
                            </svg>
                        </div>
                    </a>
                    @endforeach
                </div>
                @else
                <p class="text-sm text-[#088395]/70">No projects yet. <a href="{{ route('admin.projects.create', ['client_id' => $client->id]) }}" class="text-[#088395] hover:text-[#37B7C3]">Create one</a></p>
                @endif
            </div>
        </div>
    </div>
</div>
@endsection

