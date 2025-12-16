@extends('admin.layouts.tailadmin')

@section('title', 'Templates')

@section('content')
<div class="space-y-6">
    <div class="flex flex-col gap-4 sm:flex-row sm:items-center sm:justify-between">
        <div>
            <h2 class="text-2xl font-bold text-[#11224E]">Templates</h2>
            <p class="text-sm text-[#088395]/70 mt-1">Store reusable documents, images, and links.</p>
        </div>
        <div class="flex flex-wrap gap-3">
            <a href="{{ route('admin.template-categories.index') }}" class="inline-flex items-center gap-2 rounded-lg border border-[#088395]/20 px-4 py-2.5 text-sm font-medium text-[#088395] hover:bg-[#088395]/5">
                Manage Categories
            </a>
            <a href="{{ route('admin.templates.create') }}" class="inline-flex items-center gap-2 rounded-lg bg-[#088395] px-4 py-2.5 text-sm font-medium text-white hover:bg-[#37B7C3]">
                New Template
            </a>
        </div>
    </div>

    <form method="GET" class="rounded-xl border border-[#088395]/20 bg-white p-4 shadow-sm grid grid-cols-1 gap-3 md:grid-cols-3">
        <div>
            <label class="text-xs font-medium text-[#088395]/70">Category</label>
            <select name="category" class="w-full rounded-lg border border-[#088395]/20 px-3 py-2 text-sm">
                <option value="">All</option>
                @foreach($categories as $category)
                <option value="{{ $category->id }}" {{ request('category') == $category->id ? 'selected' : '' }}>
                    {{ $category->name }}
                </option>
                @endforeach
            </select>
        </div>
        <div>
            <label class="text-xs font-medium text-[#088395]/70">Search</label>
            <input type="text" name="search" value="{{ request('search') }}" class="w-full rounded-lg border border-[#088395]/20 px-3 py-2 text-sm" placeholder="Title or description">
        </div>
        <div class="flex items-end">
            <button class="inline-flex items-center gap-2 rounded-lg bg-[#088395] px-4 py-2 text-sm font-medium text-white hover:bg-[#37B7C3]">
                Filter
            </button>
        </div>
    </form>

    @if(session('success'))
        <div class="rounded-lg border border-green-200 bg-green-50 px-4 py-3 text-sm text-green-800">
            {{ session('success') }}
        </div>
    @endif

    <div class="rounded-xl border border-[#088395]/20 bg-white shadow-sm overflow-hidden">
        <div class="overflow-x-auto">
            <table class="min-w-full divide-y divide-[#088395]/15">
                <thead class="bg-[#088395]/5">
                    <tr>
                        <th class="px-6 py-3 text-left text-xs font-semibold uppercase tracking-wider text-[#088395]">Title</th>
                        <th class="px-6 py-3 text-left text-xs font-semibold uppercase tracking-wider text-[#088395]">Category</th>
                        <th class="px-6 py-3 text-left text-xs font-semibold uppercase tracking-wider text-[#088395]">Type</th>
                        <th class="px-6 py-3 text-left text-xs font-semibold uppercase tracking-wider text-[#088395]">Status</th>
                        <th class="px-6 py-3 text-right text-xs font-semibold uppercase tracking-wider text-[#088395]">Actions</th>
                    </tr>
                </thead>
                <tbody class="divide-y divide-[#088395]/10">
                    @forelse($templates as $template)
                        <tr>
                            <td class="px-6 py-4 text-sm font-medium text-[#11224E]">{{ $template->title }}</td>
                            <td class="px-6 py-4 text-sm text-[#088395]/70">{{ $template->category?->name }}</td>
                            <td class="px-6 py-4 text-sm capitalize">{{ str_replace('_', ' ', $template->type) }}</td>
                            <td class="px-6 py-4">
                                <span class="inline-flex items-center px-3 py-1 text-xs font-medium rounded-full {{ $template->is_active ? 'bg-green-50 text-green-700' : 'bg-gray-100 text-gray-600' }}">
                                    {{ $template->is_active ? 'Active' : 'Inactive' }}
                                </span>
                            </td>
                            <td class="px-6 py-4 text-right">
                                <div class="inline-flex items-center gap-2">
                                    @if($template->file_path)
                                        <a href="{{ route('admin.templates.download', $template) }}" class="p-2 rounded-lg text-[#088395] hover:bg-[#088395]/10" title="Download">
                                            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 16v2a2 2 0 002 2h12a2 2 0 002-2v-2M7 10l5 5m0 0l5-5m-5 5V4" />
                                            </svg>
                                        </a>
                                    @endif
                                    <a href="{{ route('admin.templates.edit', $template) }}" class="p-2 rounded-lg text-[#088395] hover:bg-[#088395]/10" title="Edit">
                                        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z" />
                                        </svg>
                                    </a>
                                    <form action="{{ route('admin.templates.destroy', $template) }}" method="POST" onsubmit="return confirm('Delete this template?');">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="p-2 rounded-lg text-red-600 hover:bg-red-50" title="Delete">
                                            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16" />
                                            </svg>
                                        </button>
                                    </form>
                                </div>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="5" class="px-6 py-8 text-center text-sm text-[#088395]/70">
                                No templates found. Use the button above to create one.
                            </td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
        <div class="px-6 py-4 border-t border-[#088395]/20">
            {{ $templates->withQueryString()->links() }}
        </div>
    </div>
</div>
@endsection

