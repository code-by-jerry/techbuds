@extends('admin.layouts.tailadmin')

@section('title', 'View Tool Category')

@section('content')
<div class="space-y-6">
    <!-- Header -->
    <div class="flex items-center justify-between">
        <div>
            <h2 class="text-2xl font-bold text-[#11224E]">{{ $toolCategory->name }}</h2>
            <p class="text-sm text-[#088395]/70 mt-1">Category details and links</p>
        </div>
        <div class="flex items-center gap-3">
            <a href="{{ route('admin.tool-categories.edit', $toolCategory) }}" class="inline-flex items-center gap-2 rounded-lg border border-[#088395]/20 px-4 py-2 text-sm font-medium text-[#088395] transition-colors hover:bg-[#088395]/5">
                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z" />
                </svg>
                Edit
            </a>
            <a href="{{ route('admin.tool-categories.index') }}" class="inline-flex items-center gap-2 rounded-lg border border-[#088395]/20 px-4 py-2 text-sm font-medium text-[#088395] transition-colors hover:bg-[#088395]/5">
                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
                </svg>
                Back
            </a>
        </div>
    </div>

    <!-- Category Info -->
    <div class="rounded-2xl border border-[#088395]/10 bg-white p-6 shadow-sm">
        <h3 class="mb-4 text-lg font-semibold text-[#11224E]">Category Information</h3>
        <div class="space-y-3">
            <div>
                <span class="text-xs font-medium text-[#088395]/70 uppercase">Name</span>
                <p class="mt-1 text-sm text-[#11224E]">{{ $toolCategory->name }}</p>
            </div>
            <div>
                <span class="text-xs font-medium text-[#088395]/70 uppercase">Slug</span>
                <p class="mt-1 text-sm text-[#11224E]"><code class="bg-[#088395]/5 px-2 py-1 rounded">{{ $toolCategory->slug }}</code></p>
            </div>
            @if($toolCategory->description)
            <div>
                <span class="text-xs font-medium text-[#088395]/70 uppercase">Description</span>
                <p class="mt-1 text-sm text-[#11224E]">{{ $toolCategory->description }}</p>
            </div>
            @endif
            <div class="grid grid-cols-3 gap-4">
                <div>
                    <span class="text-xs font-medium text-[#088395]/70 uppercase">Order</span>
                    <p class="mt-1 text-sm text-[#11224E]">{{ $toolCategory->order }}</p>
                </div>
                <div>
                    <span class="text-xs font-medium text-[#088395]/70 uppercase">Status</span>
                    <p class="mt-1">
                        @if($toolCategory->is_active)
                        <span class="inline-flex items-center gap-1 rounded-full bg-green-50 px-2.5 py-0.5 text-xs font-medium text-green-600">Active</span>
                        @else
                        <span class="inline-flex items-center gap-1 rounded-full bg-gray-100 px-2.5 py-0.5 text-xs font-medium text-gray-600">Inactive</span>
                        @endif
                    </p>
                </div>
                <div>
                    <span class="text-xs font-medium text-[#088395]/70 uppercase">Links</span>
                    <p class="mt-1 text-sm text-[#11224E]">{{ $toolCategory->allLinks->count() }}</p>
                </div>
            </div>
        </div>
    </div>

    <!-- Links -->
    <div class="rounded-2xl border border-[#088395]/10 bg-white p-6 shadow-sm">
        <div class="flex items-center justify-between mb-4">
            <h3 class="text-lg font-semibold text-[#11224E]">Links</h3>
            <a href="{{ route('admin.tool-links.create', ['category_id' => $toolCategory->id]) }}" class="inline-flex items-center gap-2 rounded-lg bg-[#088395] px-4 py-2 text-sm font-medium text-white transition-colors hover:bg-[#37B7C3]">
                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4" />
                </svg>
                Add Link
            </a>
        </div>

        @if($toolCategory->allLinks->count() > 0)
            <div class="overflow-x-auto">
                <table class="w-full">
                    <thead class="bg-[#088395]/5">
                        <tr>
                            <th class="px-4 py-3 text-left text-xs font-semibold uppercase tracking-wider text-[#11224E]">Title</th>
                            <th class="px-4 py-3 text-left text-xs font-semibold uppercase tracking-wider text-[#11224E]">URL</th>
                            <th class="px-4 py-3 text-left text-xs font-semibold uppercase tracking-wider text-[#11224E]">Order</th>
                            <th class="px-4 py-3 text-left text-xs font-semibold uppercase tracking-wider text-[#11224E]">Status</th>
                            <th class="px-4 py-3 text-right text-xs font-semibold uppercase tracking-wider text-[#11224E]">Actions</th>
                        </tr>
                    </thead>
                    <tbody class="divide-y divide-[#088395]/10">
                        @foreach($toolCategory->allLinks as $link)
                        <tr class="hover:bg-[#088395]/2 transition-colors">
                            <td class="px-4 py-3">
                                <div class="font-medium text-sm text-[#11224E]">{{ $link->title }}</div>
                                @if($link->description)
                                    <div class="text-xs text-[#088395]/70 mt-1">{{ Str::limit($link->description, 50) }}</div>
                                @endif
                            </td>
                            <td class="px-4 py-3">
                                <a href="{{ $link->url }}" target="_blank" class="text-xs text-[#088395] hover:text-[#37B7C3] truncate max-w-xs block">
                                    {{ Str::limit($link->url, 40) }}
                                </a>
                            </td>
                            <td class="px-4 py-3 text-sm text-[#11224E]">{{ $link->order }}</td>
                            <td class="px-4 py-3">
                                @if($link->is_active)
                                <span class="inline-flex items-center gap-1 rounded-full bg-green-50 px-2.5 py-0.5 text-xs font-medium text-green-600">Active</span>
                                @else
                                <span class="inline-flex items-center gap-1 rounded-full bg-gray-100 px-2.5 py-0.5 text-xs font-medium text-gray-600">Inactive</span>
                                @endif
                            </td>
                            <td class="px-4 py-3 text-right">
                                <div class="flex items-center justify-end gap-2">
                                    <a href="{{ route('admin.tool-links.edit', $link) }}" class="text-[#088395] hover:text-[#37B7C3]">
                                        <svg class="h-4 w-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z" />
                                        </svg>
                                    </a>
                                    <form action="{{ route('admin.tool-links.destroy', $link) }}" method="POST" class="inline" onsubmit="return confirm('Are you sure you want to delete this link?');">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="text-red-600 hover:text-red-700">
                                            <svg class="h-4 w-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16" />
                                            </svg>
                                        </button>
                                    </form>
                                </div>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        @else
            <div class="text-center py-8">
                <p class="text-sm text-[#088395]/70">No links in this category yet.</p>
                <a href="{{ route('admin.tool-links.create', ['category_id' => $toolCategory->id]) }}" class="mt-4 inline-flex items-center gap-2 rounded-lg bg-[#088395] px-4 py-2 text-sm font-medium text-white transition-colors hover:bg-[#37B7C3]">
                    Add First Link
                </a>
            </div>
        @endif
    </div>
</div>
@endsection

