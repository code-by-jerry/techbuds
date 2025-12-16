@extends('admin.layouts.tailadmin')

@section('title', 'CRM Dashboard')

@section('content')
<div class="space-y-6">
    <!-- Page Header -->
    <div class="flex items-center justify-between">
        <div>
            <h1 class="text-2xl font-bold text-[#11224E]">CRM Dashboard</h1>
            <p class="text-sm text-[#088395]/70 mt-1">Overview of your clients, projects, and business metrics</p>
        </div>
        <a href="{{ route('admin.pipeline') }}" class="inline-flex items-center gap-2 rounded-lg bg-[#088395] px-4 py-2 text-sm font-medium text-white transition-colors hover:bg-[#37B7C3]">
            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 17V7m0 10a2 2 0 01-2 2H5a2 2 0 01-2-2V7a2 2 0 012-2h2a2 2 0 012 2m0 10a2 2 0 002 2h2a2 2 0 002-2M9 7a2 2 0 012-2h2a2 2 0 012 2m0 10V7m0 10a2 2 0 002 2h2a2 2 0 002-2V7a2 2 0 00-2-2h-2a2 2 0 00-2 2" />
            </svg>
            View Pipeline
        </a>
    </div>

    <!-- KPI Cards -->
    <div class="grid grid-cols-1 gap-4 sm:grid-cols-2 lg:grid-cols-4">
        <!-- Total Clients -->
        <div class="rounded-2xl border border-[#088395]/10 bg-white p-6 shadow-sm hover:shadow-md transition-shadow">
            <div class="flex h-12 w-12 items-center justify-center rounded-xl bg-gradient-to-br from-[#088395] to-[#37B7C3]">
                <svg class="text-white w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 20h5v-2a3 3 0 00-5.356-1.857M17 20H7m10 0v-2c0-.656-.126-1.283-.356-1.857M7 20H2v-2a3 3 0 015.356-1.857M7 20v-2c0-.656.126-1.283.356-1.857m0 0a5.002 5.002 0 019.288 0M15 7a3 3 0 11-6 0 3 3 0 016 0zm6 3a2 2 0 11-4 0 2 2 0 014 0zM7 10a2 2 0 11-4 0 2 2 0 014 0z" />
                </svg>
            </div>
            <div class="mt-4">
                <p class="text-sm text-[#088395]/70">Total Clients</p>
                <h3 class="mt-2 text-2xl font-bold text-[#11224E]">{{ $totalClients }}</h3>
                <div class="mt-2 flex items-center gap-2 text-xs">
                    <span class="text-green-600">{{ $activeClients }} Active</span>
                    <span class="text-[#088395]/70">•</span>
                    <span class="text-[#088395]/70">{{ $newClientsThisMonth }} New this month</span>
                </div>
            </div>
        </div>

        <!-- Total Projects -->
        <div class="rounded-2xl border border-[#088395]/10 bg-white p-6 shadow-sm hover:shadow-md transition-shadow">
            <div class="flex h-12 w-12 items-center justify-center rounded-xl bg-gradient-to-br from-[#37B7C3] to-[#088395]">
                <svg class="text-white w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5H7a2 2 0 00-2 2v12a2 2 0 002 2h10a2 2 0 002-2V7a2 2 0 00-2-2h-2M9 5a2 2 0 002 2h2a2 2 0 002-2M9 5a2 2 0 012-2h2a2 2 0 012 2m-6 9l2 2 4-4" />
                </svg>
            </div>
            <div class="mt-4">
                <p class="text-sm text-[#088395]/70">Total Projects</p>
                <h3 class="mt-2 text-2xl font-bold text-[#11224E]">{{ $totalProjects }}</h3>
                <div class="mt-2 flex items-center gap-2 text-xs">
                    <span class="text-blue-600">{{ $activeProjects }} Active</span>
                    <span class="text-[#088395]/70">•</span>
                    <span class="text-green-600">{{ $completedProjects }} Completed</span>
                </div>
            </div>
        </div>

        <!-- Total Tasks -->
        <div class="rounded-2xl border border-[#088395]/10 bg-white p-6 shadow-sm hover:shadow-md transition-shadow">
            <div class="flex h-12 w-12 items-center justify-center rounded-xl bg-gradient-to-br from-[#088395] to-[#37B7C3]">
                <svg class="text-white w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5H7a2 2 0 00-2 2v12a2 2 0 002 2h10a2 2 0 002-2V7a2 2 0 00-2-2h-2M9 5a2 2 0 002 2h2a2 2 0 002-2M9 5a2 2 0 012-2h2a2 2 0 012 2m-6 9l2 2 4-4" />
                </svg>
            </div>
            <div class="mt-4">
                <p class="text-sm text-[#088395]/70">Total Tasks</p>
                <h3 class="mt-2 text-2xl font-bold text-[#11224E]">{{ $totalTasks }}</h3>
                <div class="mt-2 flex items-center gap-2 text-xs">
                    <span class="text-blue-600">{{ $tasksInProgress }} In Progress</span>
                    <span class="text-[#088395]/70">•</span>
                    <span class="text-red-600">{{ $overdueTasks }} Overdue</span>
                </div>
            </div>
        </div>

        <!-- Total Revenue -->
        <div class="rounded-2xl border border-[#088395]/10 bg-white p-6 shadow-sm hover:shadow-md transition-shadow">
            <div class="flex h-12 w-12 items-center justify-center rounded-xl bg-gradient-to-br from-[#37B7C3] to-[#088395]">
                <svg class="text-white w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8c-1.657 0-3 .895-3 2s1.343 2 3 2 3 .895 3 2-1.343 2-3 2m0-8c1.11 0 2.08.402 2.599 1M12 8V7m0 1v8m0 0v1m0-1c-1.11 0-2.08-.402-2.599-1M21 12a9 9 0 11-18 0 9 9 0 0118 0z" />
                </svg>
            </div>
            <div class="mt-4">
                <p class="text-sm text-[#088395]/70">Total Revenue</p>
                <h3 class="mt-2 text-2xl font-bold text-[#11224E]">₹{{ number_format($totalRevenue, 2) }}</h3>
                <div class="mt-2 flex items-center gap-2 text-xs">
                    <span class="text-orange-600">{{ $pendingInvoices }} Pending</span>
                    <span class="text-[#088395]/70">•</span>
                    <span class="text-red-600">{{ $overdueInvoices }} Overdue</span>
                </div>
            </div>
        </div>
    </div>

    <!-- Main Content Grid -->
    <div class="grid grid-cols-1 gap-6 lg:grid-cols-3">
        <!-- Left Column -->
        <div class="lg:col-span-2 space-y-6">
            <!-- Upcoming Deadlines -->
            <div class="rounded-2xl border border-[#088395]/10 bg-white p-6 shadow-sm">
                <h3 class="mb-4 text-lg font-semibold text-[#11224E]">Upcoming Deadlines</h3>
                <div class="space-y-4">
                    <!-- Tasks -->
                    @if($upcomingTasks->count() > 0)
                    <div>
                        <h4 class="mb-2 text-sm font-medium text-[#088395]/70 uppercase tracking-wide">Tasks</h4>
                        <div class="space-y-2">
                            @foreach($upcomingTasks->take(5) as $task)
                            <div class="flex items-center justify-between rounded-lg border border-[#088395]/10 bg-white p-3">
                                <div class="flex-1">
                                    <p class="text-sm font-medium text-[#11224E]">{{ $task->title }}</p>
                                    <p class="text-xs text-[#088395]/70">{{ $task->project->title }} • Due: {{ $task->due_date->format('M d, Y') }}</p>
                                </div>
                                <a href="{{ route('admin.projects.show', $task->project) }}" class="text-[#088395] hover:text-[#37B7C3]">
                                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7" />
                                    </svg>
                                </a>
                            </div>
                            @endforeach
                        </div>
                    </div>
                    @endif

                    <!-- Milestones -->
                    @if($upcomingMilestones->count() > 0)
                    <div>
                        <h4 class="mb-2 text-sm font-medium text-[#088395]/70 uppercase tracking-wide">Milestones</h4>
                        <div class="space-y-2">
                            @foreach($upcomingMilestones->take(5) as $milestone)
                            <div class="flex items-center justify-between rounded-lg border border-[#088395]/10 bg-white p-3">
                                <div class="flex-1">
                                    <p class="text-sm font-medium text-[#11224E]">{{ $milestone->title }}</p>
                                    <p class="text-xs text-[#088395]/70">{{ $milestone->project->title }} • Due: {{ $milestone->due_date->format('M d, Y') }}</p>
                                </div>
                                <a href="{{ route('admin.projects.show', $milestone->project) }}" class="text-[#088395] hover:text-[#37B7C3]">
                                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7" />
                                    </svg>
                                </a>
                            </div>
                            @endforeach
                        </div>
                    </div>
                    @endif

                    <!-- Invoices -->
                    @if($upcomingInvoices->count() > 0)
                    <div>
                        <h4 class="mb-2 text-sm font-medium text-[#088395]/70 uppercase tracking-wide">Invoices</h4>
                        <div class="space-y-2">
                            @foreach($upcomingInvoices->take(5) as $invoice)
                            <div class="flex items-center justify-between rounded-lg border border-[#088395]/10 bg-white p-3">
                                <div class="flex-1">
                                    <p class="text-sm font-medium text-[#11224E]">{{ $invoice->invoice_number }}</p>
                                    <p class="text-xs text-[#088395]/70">{{ $invoice->project->client->name }} • ₹{{ number_format($invoice->total_amount, 2) }} • Due: {{ $invoice->due_date->format('M d, Y') }}</p>
                                </div>
                                <a href="{{ route('admin.invoices.show', $invoice) }}" class="text-[#088395] hover:text-[#37B7C3]">
                                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7" />
                                    </svg>
                                </a>
                            </div>
                            @endforeach
                        </div>
                    </div>
                    @endif

                    @if($upcomingTasks->count() === 0 && $upcomingMilestones->count() === 0 && $upcomingInvoices->count() === 0)
                    <p class="text-sm text-[#088395]/70 text-center py-4">No upcoming deadlines</p>
                    @endif
                </div>
            </div>

            <!-- Recent Activity -->
            <div class="rounded-2xl border border-[#088395]/10 bg-white p-6 shadow-sm">
                <h3 class="mb-4 text-lg font-semibold text-[#11224E]">Recent Activity</h3>
                @if($recentActivity->count() > 0)
                <div class="space-y-3">
                    @foreach($recentActivity as $activity)
                    <div class="flex items-start gap-3 rounded-lg border border-[#088395]/10 bg-white p-3">
                        <div class="flex-shrink-0">
                            <div class="h-8 w-8 rounded-full bg-[#088395]/10 flex items-center justify-center">
                                <svg class="w-4 h-4 text-[#088395]" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z" />
                                </svg>
                            </div>
                        </div>
                        <div class="flex-1 min-w-0">
                            <p class="text-sm text-[#11224E]">{{ $activity->description }}</p>
                            <div class="mt-1 flex items-center gap-2 text-xs text-[#088395]/70">
                                @if($activity->user)
                                <span>{{ $activity->user->name }}</span>
                                <span>•</span>
                                @endif
                                <span>{{ $activity->created_at->diffForHumans() }}</span>
                            </div>
                        </div>
                    </div>
                    @endforeach
                </div>
                @else
                <p class="text-sm text-[#088395]/70 text-center py-4">No recent activity</p>
                @endif
            </div>
        </div>

        <!-- Right Column -->
        <div class="space-y-6">
            <!-- Quick Stats -->
            <div class="rounded-2xl border border-[#088395]/10 bg-white p-6 shadow-sm">
                <h3 class="mb-4 text-lg font-semibold text-[#11224E]">Quick Stats</h3>
                <div class="space-y-4">
                    <div class="flex items-center justify-between">
                        <span class="text-sm text-[#088395]/70">Projects in Development</span>
                        <span class="text-lg font-semibold text-[#11224E]">{{ $projectsInDevelopment }}</span>
                    </div>
                    <div class="flex items-center justify-between">
                        <span class="text-sm text-[#088395]/70">Completed Tasks</span>
                        <span class="text-lg font-semibold text-green-600">{{ $completedTasks }}</span>
                    </div>
                    <div class="flex items-center justify-between">
                        <span class="text-sm text-[#088395]/70">Total Invoices</span>
                        <span class="text-lg font-semibold text-[#11224E]">{{ $totalInvoices }}</span>
                    </div>
                    <div class="flex items-center justify-between">
                        <span class="text-sm text-[#088395]/70">Overdue Invoices</span>
                        <span class="text-lg font-semibold text-red-600">{{ $overdueInvoices }}</span>
                    </div>
                </div>
            </div>

            <!-- Quick Actions -->
            <div class="rounded-2xl border border-[#088395]/10 bg-white p-6 shadow-sm">
                <h3 class="mb-4 text-lg font-semibold text-[#11224E]">Quick Actions</h3>
                <div class="space-y-2">
                    <a href="{{ route('admin.clients.create') }}" class="flex items-center gap-3 rounded-lg border border-[#088395]/10 bg-white p-3 hover:bg-[#088395]/5 transition-colors">
                        <svg class="w-5 h-5 text-[#088395]" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4" />
                        </svg>
                        <span class="text-sm font-medium text-[#11224E]">Add New Client</span>
                    </a>
                    <a href="{{ route('admin.projects.create') }}" class="flex items-center gap-3 rounded-lg border border-[#088395]/10 bg-white p-3 hover:bg-[#088395]/5 transition-colors">
                        <svg class="w-5 h-5 text-[#088395]" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4" />
                        </svg>
                        <span class="text-sm font-medium text-[#11224E]">Create New Project</span>
                    </a>
                    <a href="{{ route('admin.clients.index') }}" class="flex items-center gap-3 rounded-lg border border-[#088395]/10 bg-white p-3 hover:bg-[#088395]/5 transition-colors">
                        <svg class="w-5 h-5 text-[#088395]" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 20h5v-2a3 3 0 00-5.356-1.857M17 20H7m10 0v-2c0-.656-.126-1.283-.356-1.857M7 20H2v-2a3 3 0 015.356-1.857M7 20v-2c0-.656.126-1.283.356-1.857m0 0a5.002 5.002 0 019.288 0M15 7a3 3 0 11-6 0 3 3 0 016 0zm6 3a2 2 0 11-4 0 2 2 0 014 0zM7 10a2 2 0 11-4 0 2 2 0 014 0z" />
                        </svg>
                        <span class="text-sm font-medium text-[#11224E]">View All Clients</span>
                    </a>
                    <a href="{{ route('admin.projects.index') }}" class="flex items-center gap-3 rounded-lg border border-[#088395]/10 bg-white p-3 hover:bg-[#088395]/5 transition-colors">
                        <svg class="w-5 h-5 text-[#088395]" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5H7a2 2 0 00-2 2v12a2 2 0 002 2h10a2 2 0 002-2V7a2 2 0 00-2-2h-2M9 5a2 2 0 002 2h2a2 2 0 002-2M9 5a2 2 0 012-2h2a2 2 0 012 2m-6 9l2 2 4-4" />
                        </svg>
                        <span class="text-sm font-medium text-[#11224E]">View All Projects</span>
                    </a>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

