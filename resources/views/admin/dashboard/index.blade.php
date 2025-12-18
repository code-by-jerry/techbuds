@extends('admin.layouts.tailadmin')

@section('title', 'CRM Dashboard')

@section('content')
<div class="space-y-6">
    <!-- Page Header -->
    <div class="flex items-center justify-between">
        <div>
            <h1 class="font-display text-2xl font-bold text-heading">CRM Dashboard</h1>
            <p class="text-sm text-text-muted mt-1">Overview of your clients, projects, and business metrics</p>
        </div>
        <a href="{{ route('admin.pipeline') }}" class="inline-flex items-center gap-2 rounded-lg bg-brand-primary px-4 py-2.5 text-sm font-medium text-white transition-all hover:bg-brand-hover shadow-lg shadow-brand-primary/25">
            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 17V7m0 10a2 2 0 01-2 2H5a2 2 0 01-2-2V7a2 2 0 012-2h2a2 2 0 012 2m0 10a2 2 0 002 2h2a2 2 0 002-2M9 7a2 2 0 012-2h2a2 2 0 012 2m0 10V7m0 10a2 2 0 002 2h2a2 2 0 002-2V7a2 2 0 00-2-2h-2a2 2 0 00-2 2" />
            </svg>
            View Pipeline
        </a>
    </div>

    <!-- KPI Cards -->
    <div class="grid grid-cols-1 gap-4 sm:grid-cols-2 lg:grid-cols-4">
        <!-- Total Clients -->
        <div class="rounded-xl border border-border-default bg-surface-2 p-6 hover:border-brand-primary transition-all duration-200">
            <div class="flex h-12 w-12 items-center justify-center rounded-xl bg-gradient-to-br from-brand-primary to-brand-soft">
                <svg class="text-white w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 20h5v-2a3 3 0 00-5.356-1.857M17 20H7m10 0v-2c0-.656-.126-1.283-.356-1.857M7 20H2v-2a3 3 0 015.356-1.857M7 20v-2c0-.656.126-1.283.356-1.857m0 0a5.002 5.002 0 019.288 0M15 7a3 3 0 11-6 0 3 3 0 016 0zm6 3a2 2 0 11-4 0 2 2 0 014 0zM7 10a2 2 0 11-4 0 2 2 0 014 0z" />
                </svg>
            </div>
            <div class="mt-4">
                <p class="text-sm text-text-muted">Total Clients</p>
                <h3 class="mt-2 text-2xl font-bold text-heading">{{ $totalClients }}</h3>
                <div class="mt-2 flex items-center gap-2 text-xs">
                    <span class="text-success">{{ $activeClients }} Active</span>
                    <span class="text-text-disabled">•</span>
                    <span class="text-text-muted">{{ $newClientsThisMonth }} New this month</span>
                </div>
            </div>
        </div>

        <!-- Total Projects -->
        <div class="rounded-xl border border-border-default bg-surface-2 p-6 hover:border-brand-primary transition-all duration-200">
            <div class="flex h-12 w-12 items-center justify-center rounded-xl bg-gradient-to-br from-brand-soft to-brand-primary">
                <svg class="text-white w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5H7a2 2 0 00-2 2v12a2 2 0 002 2h10a2 2 0 002-2V7a2 2 0 00-2-2h-2M9 5a2 2 0 002 2h2a2 2 0 002-2M9 5a2 2 0 012-2h2a2 2 0 012 2m-6 9l2 2 4-4" />
                </svg>
            </div>
            <div class="mt-4">
                <p class="text-sm text-text-muted">Total Projects</p>
                <h3 class="mt-2 text-2xl font-bold text-heading">{{ $totalProjects }}</h3>
                <div class="mt-2 flex items-center gap-2 text-xs">
                    <span class="text-brand-soft">{{ $activeProjects }} Active</span>
                    <span class="text-text-disabled">•</span>
                    <span class="text-success">{{ $completedProjects }} Completed</span>
                </div>
            </div>
        </div>

        <!-- Total Tasks -->
        <div class="rounded-xl border border-border-default bg-surface-2 p-6 hover:border-brand-primary transition-all duration-200">
            <div class="flex h-12 w-12 items-center justify-center rounded-xl bg-gradient-to-br from-brand-primary to-brand-soft">
                <svg class="text-white w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5H7a2 2 0 00-2 2v12a2 2 0 002 2h10a2 2 0 002-2V7a2 2 0 00-2-2h-2M9 5a2 2 0 002 2h2a2 2 0 002-2M9 5a2 2 0 012-2h2a2 2 0 012 2m-6 9l2 2 4-4" />
                </svg>
            </div>
            <div class="mt-4">
                <p class="text-sm text-text-muted">Total Tasks</p>
                <h3 class="mt-2 text-2xl font-bold text-heading">{{ $totalTasks }}</h3>
                <div class="mt-2 flex items-center gap-2 text-xs">
                    <span class="text-brand-soft">{{ $tasksInProgress }} In Progress</span>
                    <span class="text-text-disabled">•</span>
                    <span class="text-error">{{ $overdueTasks }} Overdue</span>
                </div>
            </div>
        </div>

        <!-- Total Revenue -->
        <div class="rounded-xl border border-border-default bg-surface-2 p-6 hover:border-brand-primary transition-all duration-200">
            <div class="flex h-12 w-12 items-center justify-center rounded-xl bg-gradient-to-br from-brand-soft to-brand-primary">
                <svg class="text-white w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8c-1.657 0-3 .895-3 2s1.343 2 3 2 3 .895 3 2-1.343 2-3 2m0-8c1.11 0 2.08.402 2.599 1M12 8V7m0 1v8m0 0v1m0-1c-1.11 0-2.08-.402-2.599-1M21 12a9 9 0 11-18 0 9 9 0 0118 0z" />
                </svg>
            </div>
            <div class="mt-4">
                <p class="text-sm text-text-muted">Total Revenue</p>
                <h3 class="mt-2 text-2xl font-bold text-heading">₹{{ number_format($totalRevenue, 2) }}</h3>
                <div class="mt-2 flex items-center gap-2 text-xs">
                    <span class="text-warning">{{ $pendingInvoices }} Pending</span>
                    <span class="text-text-disabled">•</span>
                    <span class="text-error">{{ $overdueInvoices }} Overdue</span>
                </div>
            </div>
        </div>
    </div>

    <!-- Main Content Grid -->
    <div class="grid grid-cols-1 gap-6 lg:grid-cols-3">
        <!-- Left Column -->
        <div class="lg:col-span-2 space-y-6">
            <!-- Upcoming Deadlines -->
            <div class="rounded-xl border border-border-default bg-surface-2 p-6">
                <h3 class="mb-4 text-lg font-semibold text-heading">Upcoming Deadlines</h3>
                <div class="space-y-4">
                    <!-- Tasks -->
                    @if($upcomingTasks->count() > 0)
                    <div>
                        <h4 class="mb-2 text-xs font-medium text-text-disabled uppercase tracking-wider">Tasks</h4>
                        <div class="space-y-2">
                            @foreach($upcomingTasks->take(5) as $task)
                            <div class="flex items-center justify-between rounded-lg border border-border-default bg-surface-1 p-3 hover:border-brand-primary/50 transition-colors">
                                <div class="flex-1">
                                    <p class="text-sm font-medium text-text-primary">{{ $task->title }}</p>
                                    <p class="text-xs text-text-disabled">{{ $task->project->title }} • Due: {{ $task->due_date->format('M d, Y') }}</p>
                                </div>
                                <a href="{{ route('admin.projects.show', $task->project) }}" class="text-brand-primary hover:text-brand-soft transition-colors">
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
                        <h4 class="mb-2 text-xs font-medium text-text-disabled uppercase tracking-wider">Milestones</h4>
                        <div class="space-y-2">
                            @foreach($upcomingMilestones->take(5) as $milestone)
                            <div class="flex items-center justify-between rounded-lg border border-border-default bg-surface-1 p-3 hover:border-brand-primary/50 transition-colors">
                                <div class="flex-1">
                                    <p class="text-sm font-medium text-text-primary">{{ $milestone->title }}</p>
                                    <p class="text-xs text-text-disabled">{{ $milestone->project->title }} • Due: {{ $milestone->due_date->format('M d, Y') }}</p>
                                </div>
                                <a href="{{ route('admin.projects.show', $milestone->project) }}" class="text-brand-primary hover:text-brand-soft transition-colors">
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
                        <h4 class="mb-2 text-xs font-medium text-text-disabled uppercase tracking-wider">Invoices</h4>
                        <div class="space-y-2">
                            @foreach($upcomingInvoices->take(5) as $invoice)
                            <div class="flex items-center justify-between rounded-lg border border-border-default bg-surface-1 p-3 hover:border-brand-primary/50 transition-colors">
                                <div class="flex-1">
                                    <p class="text-sm font-medium text-text-primary">{{ $invoice->invoice_number }}</p>
                                    <p class="text-xs text-text-disabled">{{ $invoice->project->client->name }} • ₹{{ number_format($invoice->total_amount, 2) }} • Due: {{ $invoice->due_date->format('M d, Y') }}</p>
                                </div>
                                <a href="{{ route('admin.invoices.show', $invoice) }}" class="text-brand-primary hover:text-brand-soft transition-colors">
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
                    <p class="text-sm text-text-disabled text-center py-4">No upcoming deadlines</p>
                    @endif
                </div>
            </div>

            <!-- Recent Activity -->
            <div class="rounded-xl border border-border-default bg-surface-2 p-6">
                <h3 class="mb-4 text-lg font-semibold text-heading">Recent Activity</h3>
                @if($recentActivity->count() > 0)
                <div class="space-y-3">
                    @foreach($recentActivity as $activity)
                    <div class="flex items-start gap-3 rounded-lg border border-border-default bg-surface-1 p-3">
                        <div class="flex-shrink-0">
                            <div class="h-8 w-8 rounded-full bg-brand-primary/10 flex items-center justify-center">
                                <svg class="w-4 h-4 text-brand-primary" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z" />
                                </svg>
                            </div>
                        </div>
                        <div class="flex-1 min-w-0">
                            <p class="text-sm text-text-primary">{{ $activity->description }}</p>
                            <div class="mt-1 flex items-center gap-2 text-xs text-text-disabled">
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
                <p class="text-sm text-text-disabled text-center py-4">No recent activity</p>
                @endif
            </div>
        </div>

        <!-- Right Column -->
        <div class="space-y-6">
            <!-- Quick Stats -->
            <div class="rounded-xl border border-border-default bg-surface-2 p-6">
                <h3 class="mb-4 text-lg font-semibold text-heading">Quick Stats</h3>
                <div class="space-y-4">
                    <div class="flex items-center justify-between">
                        <span class="text-sm text-text-muted">Projects in Development</span>
                        <span class="text-lg font-semibold text-heading">{{ $projectsInDevelopment }}</span>
                    </div>
                    <div class="flex items-center justify-between">
                        <span class="text-sm text-text-muted">Completed Tasks</span>
                        <span class="text-lg font-semibold text-success">{{ $completedTasks }}</span>
                    </div>
                    <div class="flex items-center justify-between">
                        <span class="text-sm text-text-muted">Total Invoices</span>
                        <span class="text-lg font-semibold text-heading">{{ $totalInvoices }}</span>
                    </div>
                    <div class="flex items-center justify-between">
                        <span class="text-sm text-text-muted">Overdue Invoices</span>
                        <span class="text-lg font-semibold text-error">{{ $overdueInvoices }}</span>
                    </div>
                </div>
            </div>

            <!-- Quick Actions -->
            <div class="rounded-xl border border-border-default bg-surface-2 p-6">
                <h3 class="mb-4 text-lg font-semibold text-heading">Quick Actions</h3>
                <div class="space-y-2">
                    <a href="{{ route('admin.clients.create') }}" class="flex items-center gap-3 rounded-lg border border-border-default bg-surface-1 p-3 hover:border-brand-primary hover:bg-brand-primary/5 transition-all">
                        <svg class="w-5 h-5 text-brand-primary" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4" />
                        </svg>
                        <span class="text-sm font-medium text-text-primary">Add New Client</span>
                    </a>
                    <a href="{{ route('admin.projects.create') }}" class="flex items-center gap-3 rounded-lg border border-border-default bg-surface-1 p-3 hover:border-brand-primary hover:bg-brand-primary/5 transition-all">
                        <svg class="w-5 h-5 text-brand-primary" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4" />
                        </svg>
                        <span class="text-sm font-medium text-text-primary">Create New Project</span>
                    </a>
                    <a href="{{ route('admin.clients.index') }}" class="flex items-center gap-3 rounded-lg border border-border-default bg-surface-1 p-3 hover:border-brand-primary hover:bg-brand-primary/5 transition-all">
                        <svg class="w-5 h-5 text-brand-primary" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 20h5v-2a3 3 0 00-5.356-1.857M17 20H7m10 0v-2c0-.656-.126-1.283-.356-1.857M7 20H2v-2a3 3 0 015.356-1.857M7 20v-2c0-.656.126-1.283.356-1.857m0 0a5.002 5.002 0 019.288 0M15 7a3 3 0 11-6 0 3 3 0 016 0zm6 3a2 2 0 11-4 0 2 2 0 014 0zM7 10a2 2 0 11-4 0 2 2 0 014 0z" />
                        </svg>
                        <span class="text-sm font-medium text-text-primary">View All Clients</span>
                    </a>
                    <a href="{{ route('admin.projects.index') }}" class="flex items-center gap-3 rounded-lg border border-border-default bg-surface-1 p-3 hover:border-brand-primary hover:bg-brand-primary/5 transition-all">
                        <svg class="w-5 h-5 text-brand-primary" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5H7a2 2 0 00-2 2v12a2 2 0 002 2h10a2 2 0 002-2V7a2 2 0 00-2-2h-2M9 5a2 2 0 002 2h2a2 2 0 002-2M9 5a2 2 0 012-2h2a2 2 0 012 2m-6 9l2 2 4-4" />
                        </svg>
                        <span class="text-sm font-medium text-text-primary">View All Projects</span>
                    </a>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
