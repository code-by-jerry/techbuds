@extends('admin.layouts.tailadmin')

@section('title', 'Dashboard')

@section('content')
<div class="grid grid-cols-12 gap-4 md:gap-6">
    <!-- Metrics Row -->
    <div class="col-span-12 space-y-6 xl:col-span-7">
        <!-- Metric Cards -->
        <div class="grid grid-cols-1 gap-4 sm:grid-cols-2 md:gap-6">
            <!-- Total Blogs -->
            <div class="rounded-2xl border border-[#088395]/10 bg-white p-5 md:p-6 shadow-sm hover:shadow-md transition-shadow">
                <div class="flex h-12 w-12 items-center justify-center rounded-xl bg-gradient-to-br from-[#088395] to-[#37B7C3]">
                    <svg class="text-white" width="24" height="24" viewBox="0 0 24 24" fill="none">
                        <path fill-rule="evenodd" clip-rule="evenodd" d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z" fill="white"/>
                </svg>
                </div>
                <div class="mt-5 flex items-end justify-between">
            <div>
                        <span class="text-sm text-[#088395]/70">Total Blogs</span>
                        <h4 class="mt-2 text-2xl font-bold text-[#11224E]">
                            {{ \App\Models\Blog::count() }}
                        </h4>
                </div>
                    <span class="flex items-center gap-1 rounded-full bg-green-50 py-0.5 pl-2 pr-2.5 text-sm font-medium text-green-600">
                        <svg class="fill-current" width="12" height="12" viewBox="0 0 12 12">
                            <path fill-rule="evenodd" clip-rule="evenodd" d="M5.56462 1.62393C5.70193 1.47072 5.90135 1.37432 6.12329 1.37432C6.31631 1.37415 6.50845 1.44731 6.65505 1.59381L9.65514 4.5918C9.94814 4.88459 9.94831 5.35947 9.65552 5.65246C9.36273 5.94546 8.88785 5.94562 8.59486 5.65283L6.87329 3.93247L6.87329 10.125C6.87329 10.5392 6.53751 10.875 6.12329 10.875C5.70908 10.875 5.37329 10.5392 5.37329 10.125L5.37329 3.93578L3.65516 5.65282C3.36218 5.94562 2.8873 5.94547 2.5945 5.65248C2.3017 5.35949 2.30185 4.88462 2.59484 4.59182L5.56462 1.62393Z" fill=""/>
                        </svg>
                        {{ \App\Models\Blog::where('is_published', true)->count() }} Published
                    </span>
                </div>
            </div>

            <!-- Total Contacts -->
            <div class="rounded-2xl border border-[#088395]/10 bg-white p-5 md:p-6 shadow-sm hover:shadow-md transition-shadow">
                <div class="flex h-12 w-12 items-center justify-center rounded-xl bg-gradient-to-br from-[#37B7C3] to-[#088395]">
                    <svg class="text-white" width="24" height="24" viewBox="0 0 24 24" fill="none">
                        <path fill-rule="evenodd" clip-rule="evenodd" d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z" fill="white"/>
                    </svg>
                </div>
                <div class="mt-5 flex items-end justify-between">
            <div>
                        <span class="text-sm text-[#088395]/70">Total Contacts</span>
                        <h4 class="mt-2 text-2xl font-bold text-[#11224E]">
                            {{ \App\Models\Contact::count() }}
                        </h4>
                </div>
                    <span class="flex items-center gap-1 rounded-full bg-blue-50 py-0.5 pl-2 pr-2.5 text-sm font-medium text-[#088395]">
                        {{ \App\Models\Contact::where('status', 'new')->count() }} New
                    </span>
        </div>
    </div>
</div>

        <!-- Recent Activity Card -->
        <div class="overflow-hidden rounded-2xl border border-[#088395]/10 bg-white px-5 pt-5 sm:px-6 sm:pt-6 shadow-sm">
            <div class="flex items-center justify-between mb-6">
                <h3 class="text-lg font-semibold text-[#11224E]">Recent Activity</h3>
            </div>
            <div class="pb-6">
                <div class="space-y-4">
                    @php
                        $recentBlogs = \App\Models\Blog::latest()->limit(5)->get();
                        $recentContacts = \App\Models\Contact::latest()->limit(5)->get();
                    @endphp
                    
                    @forelse($recentBlogs as $blog)
                    <div class="flex items-center gap-4 pb-4 border-b border-[#088395]/10 last:border-0">
                        <div class="flex h-10 w-10 items-center justify-center rounded-full bg-gradient-to-br from-[#088395] to-[#37B7C3]">
                            <svg class="w-5 h-5" fill="none" stroke="white" stroke-width="2" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z" />
                </svg>
            </div>
            <div class="flex-1">
                            <p class="text-sm font-medium text-[#11224E]">{{ Str::limit($blog->title, 50) }}</p>
                            <p class="text-xs text-[#088395]/70">{{ $blog->created_at->diffForHumans() }}</p>
            </div>
                        <span class="text-xs px-2 py-1 rounded-full {{ $blog->is_published ? 'bg-green-50 text-green-600' : 'bg-gray-100 text-gray-600' }}">
                            {{ $blog->is_published ? 'Published' : 'Draft' }}
                        </span>
        </div>
                    @empty
                    <p class="text-sm text-[#088395]/70 text-center py-8">No recent activity</p>
                    @endforelse
            </div>
            </div>
        </div>
    </div>

    <!-- Sidebar Stats -->
    <div class="col-span-12 xl:col-span-5">
        <!-- Quick Stats -->
        <div class="rounded-2xl border border-[#088395]/10 bg-white p-5 md:p-6 mb-6 shadow-sm">
            <h3 class="text-lg font-semibold text-[#11224E] mb-4">Quick Stats</h3>
            <div class="space-y-4">
        <div class="flex items-center justify-between">
                    <span class="text-sm text-[#088395]/70">Published Blogs</span>
                    <span class="text-lg font-semibold text-[#11224E]">{{ \App\Models\Blog::where('is_published', true)->count() }}</span>
                </div>
                <div class="flex items-center justify-between">
                    <span class="text-sm text-[#088395]/70">Draft Blogs</span>
                    <span class="text-lg font-semibold text-[#11224E]">{{ \App\Models\Blog::where('is_published', false)->count() }}</span>
                </div>
                <div class="flex items-center justify-between">
                    <span class="text-sm text-[#088395]/70">New Contacts</span>
                    <span class="text-lg font-semibold text-[#11224E]">{{ \App\Models\Contact::where('status', 'new')->count() }}</span>
                </div>
                <div class="flex items-center justify-between">
                    <span class="text-sm text-[#088395]/70">Total Contacts</span>
                    <span class="text-lg font-semibold text-[#11224E]">{{ \App\Models\Contact::count() }}</span>
        </div>
    </div>
</div>

        <!-- Recent Contacts -->
        <div class="rounded-2xl border border-[#088395]/10 bg-white p-5 md:p-6 shadow-sm">
            <h3 class="text-lg font-semibold text-[#11224E] mb-4">Recent Contacts</h3>
            <div class="space-y-3">
                @forelse($recentContacts as $contact)
                <div class="flex items-center gap-3 pb-3 border-b border-[#088395]/10 last:border-0">
                    <div class="flex h-10 w-10 items-center justify-center rounded-full bg-gradient-to-br from-[#37B7C3] to-[#088395]">
                        <span class="text-white font-semibold text-sm">{{ strtoupper(substr($contact->name, 0, 1)) }}</span>
            </div>
            <div class="flex-1">
                        <p class="text-sm font-medium text-[#11224E]">{{ $contact->name }}</p>
                        <p class="text-xs text-[#088395]/70">{{ $contact->email }}</p>
            </div>
                    <span class="text-xs text-[#088395]/70">{{ $contact->created_at->diffForHumans() }}</span>
        </div>
                @empty
                <p class="text-sm text-[#088395]/70 text-center py-4">No recent contacts</p>
                @endforelse
            </div>
        </div>
    </div>
</div>
@endsection
