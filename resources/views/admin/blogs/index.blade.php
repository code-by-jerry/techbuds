@extends('admin.layouts.tailadmin')

@section('title', 'Blogs')


@section('content')
<div class="space-y-6">
    <!-- Header -->
    <div class="flex flex-col gap-4 sm:flex-row sm:items-center sm:justify-between">
        <div>
            <h2 class="text-2xl font-bold text-[#11224E]">Blog Management</h2>
            <p class="text-sm text-[#088395]/70 mt-1">Manage your SEO blog articles</p>
        </div>
        @php
            $admin = Auth::guard('admin')->user();
            $canCreate = $admin->email === 'admin@techbuds.online' || $admin->can('blogs.create');
        @endphp
        @if($canCreate)
        <a href="{{ route('admin.blogs.create') }}" class="inline-flex items-center gap-2 rounded-lg bg-[#088395] px-4 py-2.5 text-sm font-medium text-white transition-colors hover:bg-[#37B7C3]">
            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4" />
            </svg>
            Create New Blog
        </a>
        @endif
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
        <form method="GET" action="{{ route('admin.blogs.index') }}" class="flex flex-col gap-4 sm:flex-row sm:items-end">
            <!-- Search -->
            <div class="flex-1">
                <label class="mb-1 block text-xs font-medium text-[#11224E]">Search</label>
                <input
                    type="text"
                    name="search"
                    value="{{ request('search') }}"
                    placeholder="Search by title, category, or content..."
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
                    <option value="published" {{ request('status') === 'published' ? 'selected' : '' }}>Published</option>
                    <option value="draft" {{ request('status') === 'draft' ? 'selected' : '' }}>Draft</option>
                </select>
            </div>

            <!-- Category Filter -->
            @if($categories->count() > 0)
            <div class="sm:w-48">
                <label class="mb-1 block text-xs font-medium text-[#11224E]">Category</label>
                <select
                    name="category"
                    class="w-full rounded-lg border border-[#088395]/15 px-3 py-2 text-sm text-[#11224E] focus:border-[#088395] focus:outline-none focus:ring-2 focus:ring-[#088395]/20"
                >
                    <option value="">All Categories</option>
                    @foreach($categories as $category)
                    <option value="{{ $category }}" {{ request('category') === $category ? 'selected' : '' }}>{{ $category }}</option>
                    @endforeach
                </select>
            </div>
            @endif

            <!-- Submit Button -->
            <div>
                <button type="submit" class="rounded-lg bg-[#088395] px-4 py-2 text-sm font-medium text-white transition-colors hover:bg-[#37B7C3]">
                    Filter
                </button>
            </div>

            <!-- Clear Filters -->
            @if(request('search') || request('status') || request('category'))
            <div>
                <a href="{{ route('admin.blogs.index') }}" class="inline-block rounded-lg border border-[#088395]/20 px-4 py-2 text-sm font-medium text-[#088395] transition-colors hover:bg-[#088395]/5">
                    Clear
                </a>
            </div>
            @endif
        </form>
    </div>

    <!-- Blogs Table -->
    <div class="overflow-hidden rounded-2xl border border-[#088395]/10 bg-white shadow-sm">
        <div class="overflow-x-auto">
            <table class="w-full">
                <thead class="bg-[#088395]/5">
                    <tr>
                        <th class="px-6 py-3 text-left text-xs font-semibold uppercase tracking-wider text-[#11224E]">Title</th>
                        <th class="px-6 py-3 text-left text-xs font-semibold uppercase tracking-wider text-[#11224E]">Category</th>
                        <th class="px-6 py-3 text-left text-xs font-semibold uppercase tracking-wider text-[#11224E]">Status</th>
                        <th class="px-6 py-3 text-left text-xs font-semibold uppercase tracking-wider text-[#11224E]">Published Date</th>
                        <th class="px-6 py-3 text-right text-xs font-semibold uppercase tracking-wider text-[#11224E]">Actions</th>
                    </tr>
                </thead>
                <tbody class="divide-y divide-[#088395]/10 bg-white">
                    @forelse($blogs as $blog)
                    <tr class="hover:bg-[#088395]/2 transition-colors">
                        <td class="px-6 py-4">
                            <div class="flex items-center gap-3">
                                @if($blog->featured_image)
                                <img src="{{ $blog->featured_image }}" alt="{{ $blog->title }}" class="h-12 w-12 rounded-lg object-cover">
                                @else
                                <div class="flex h-12 w-12 items-center justify-center rounded-lg bg-gradient-to-br from-[#088395] to-[#37B7C3]">
                                    <svg class="w-6 h-6 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z" />
                                    </svg>
                                </div>
                                @endif
                                <div>
                                    <div class="font-medium text-[#11224E]">{{ Str::limit($blog->title, 50) }}</div>
                                    <div class="text-xs text-[#088395]/70">{{ Str::limit($blog->excerpt, 60) }}</div>
                                </div>
                            </div>
                        </td>
                        <td class="px-6 py-4">
                            <span class="inline-flex items-center rounded-full bg-[#088395]/10 px-2.5 py-0.5 text-xs font-medium text-[#088395]">
                                {{ $blog->category }}
                            </span>
                        </td>
                        <td class="px-6 py-4">
                            <div class="flex items-center gap-2">
                                @if($blog->is_published)
                                <span class="inline-flex items-center gap-1 rounded-full bg-green-50 px-2.5 py-0.5 text-xs font-medium text-green-600">
                                    <svg class="h-3 w-3" fill="currentColor" viewBox="0 0 20 20">
                                        <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd" />
                                    </svg>
                                    Published
                                </span>
                                @else
                                <span class="inline-flex items-center gap-1 rounded-full bg-gray-100 px-2.5 py-0.5 text-xs font-medium text-gray-600">
                                    Draft
                                </span>
                                @endif
                                @if($blog->is_featured)
                                <span class="inline-flex items-center gap-1 rounded-full bg-[#7E30E1]/10 px-2.5 py-0.5 text-xs font-medium text-[#7E30E1]">
                                    <svg class="h-3 w-3" fill="currentColor" viewBox="0 0 20 20">
                                        <path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z" />
                                    </svg>
                                    Featured
                                </span>
                                @endif
                            </div>
                        </td>
                        <td class="px-6 py-4 text-sm text-[#088395]/70">
                            {{ $blog->published_date ? $blog->published_date->format('M d, Y') : 'Not set' }}
                        </td>
                        <td class="px-6 py-4 text-right text-sm font-medium">
                            <div class="flex items-center justify-end gap-2">
                                @php
                                    $admin = Auth::guard('admin')->user();
                                    $canUpdate = $admin->email === 'admin@techbuds.online' || $admin->can('blogs.update');
                                    $canDelete = $admin->email === 'admin@techbuds.online' || $admin->can('blogs.delete');
                                @endphp
                                <a href="{{ route('blog.show', $blog->slug) }}" target="_blank" class="text-[#088395] hover:text-[#37B7C3]" title="View">
                                    <svg class="h-5 w-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z" />
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z" />
                                    </svg>
                                </a>
                                @if($canUpdate)
                                <a href="{{ route('admin.blogs.edit', $blog) }}" class="text-[#088395] hover:text-[#37B7C3]" title="Edit">
                                    <svg class="h-5 w-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z" />
                                    </svg>
                                </a>
                                @endif
                                @if($canDelete)
                                <form action="{{ route('admin.blogs.destroy', $blog) }}" method="POST" class="inline" onsubmit="return confirm('Are you sure you want to delete this blog?');">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="text-red-600 hover:text-red-700" title="Delete">
                                        <svg class="h-5 w-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16" />
                                        </svg>
                                    </button>
                                </form>
                                @endif
                            </div>
                        </td>
                    </tr>
                    @empty
                    <tr>
                        <td colspan="5" class="px-6 py-12 text-center">
                            <div class="mx-auto max-w-sm">
                                <svg class="mx-auto h-12 w-12 text-[#088395]/30" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z" />
                                </svg>
                                <h3 class="mt-4 text-sm font-medium text-[#11224E]">No blogs found</h3>
                                <p class="mt-2 text-sm text-[#088395]/70">Get started by creating a new blog post.</p>
                                <div class="mt-6">
                                    <a href="{{ route('admin.blogs.create') }}" class="inline-flex items-center gap-2 rounded-lg bg-[#088395] px-4 py-2 text-sm font-medium text-white transition-colors hover:bg-[#37B7C3]">
                                        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4" />
                                        </svg>
                                        Create New Blog
                                    </a>
                                </div>
                            </div>
                        </td>
                    </tr>
                    @endforelse
                </tbody>
            </table>
        </div>

        <!-- Pagination -->
        @if($blogs->hasPages())
        <div class="border-t border-[#088395]/10 px-6 py-4">
            <div class="flex flex-col gap-4 sm:flex-row sm:items-center sm:justify-between">
                <div class="text-sm text-[#088395]/70">
                    Showing {{ $blogs->firstItem() ?? 0 }} to {{ $blogs->lastItem() ?? 0 }} of {{ $blogs->total() }} results
                </div>
                <div class="flex items-center gap-2">
                    @if($blogs->onFirstPage())
                    <span class="rounded-lg border border-[#088395]/20 px-3 py-1.5 text-sm text-[#088395]/40 cursor-not-allowed">Previous</span>
                    @else
                    <a href="{{ $blogs->appends(request()->query())->previousPageUrl() }}" class="rounded-lg border border-[#088395]/20 px-3 py-1.5 text-sm text-[#088395] transition-colors hover:bg-[#088395]/5">Previous</a>
                    @endif

                    @php
                        $currentPage = $blogs->currentPage();
                        $lastPage = $blogs->lastPage();
                        $startPage = max(1, $currentPage - 2);
                        $endPage = min($lastPage, $currentPage + 2);
                    @endphp

                    @for($page = $startPage; $page <= $endPage; $page++)
                        @if($page == $currentPage)
                        <span class="rounded-lg bg-[#088395] px-3 py-1.5 text-sm font-medium text-white">{{ $page }}</span>
                        @else
                        <a href="{{ $blogs->appends(request()->query())->url($page) }}" class="rounded-lg border border-[#088395]/20 px-3 py-1.5 text-sm text-[#088395] transition-colors hover:bg-[#088395]/5">{{ $page }}</a>
                        @endif
                    @endfor

                    @if($blogs->hasMorePages())
                    <a href="{{ $blogs->appends(request()->query())->nextPageUrl() }}" class="rounded-lg border border-[#088395]/20 px-3 py-1.5 text-sm text-[#088395] transition-colors hover:bg-[#088395]/5">Next</a>
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

