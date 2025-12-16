@extends('admin.layouts.tailadmin')

@section('title', 'View Tool Link')

@section('content')
<div class="space-y-6">
    <!-- Header -->
    <div class="flex items-center justify-between">
        <div>
            <h2 class="text-2xl font-bold text-[#11224E]">{{ $toolLink->title }}</h2>
            <p class="text-sm text-[#088395]/70 mt-1">Link details</p>
        </div>
        <div class="flex items-center gap-3">
            <a href="{{ $toolLink->url }}" target="_blank" class="inline-flex items-center gap-2 rounded-lg border border-[#088395]/20 px-4 py-2 text-sm font-medium text-[#088395] transition-colors hover:bg-[#088395]/5">
                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 6H6a2 2 0 00-2 2v10a2 2 0 002 2h10a2 2 0 002-2v-4M14 4h6m0 0v6m0-6L10 14" />
                </svg>
                Visit Link
            </a>
            <a href="{{ route('admin.tool-links.edit', $toolLink) }}" class="inline-flex items-center gap-2 rounded-lg border border-[#088395]/20 px-4 py-2 text-sm font-medium text-[#088395] transition-colors hover:bg-[#088395]/5">
                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z" />
                </svg>
                Edit
            </a>
            <a href="{{ route('admin.tool-links.index') }}" class="inline-flex items-center gap-2 rounded-lg border border-[#088395]/20 px-4 py-2 text-sm font-medium text-[#088395] transition-colors hover:bg-[#088395]/5">
                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
                </svg>
                Back
            </a>
        </div>
    </div>

    <!-- Link Info -->
    <div class="rounded-2xl border border-[#088395]/10 bg-white p-6 shadow-sm">
        <h3 class="mb-4 text-lg font-semibold text-[#11224E]">Link Information</h3>
        <div class="space-y-3">
            <div>
                <span class="text-xs font-medium text-[#088395]/70 uppercase">Title</span>
                <p class="mt-1 text-sm text-[#11224E]">{{ $toolLink->title }}</p>
            </div>
            <div>
                <span class="text-xs font-medium text-[#088395]/70 uppercase">Category</span>
                <p class="mt-1">
                    @if($toolLink->category)
                        <span class="inline-flex items-center rounded-full bg-[#088395]/10 px-2.5 py-0.5 text-xs font-medium text-[#088395]">
                            {{ $toolLink->category->name }}
                        </span>
                    @else
                        <span class="inline-flex items-center rounded-full bg-gray-100 px-2.5 py-0.5 text-xs font-medium text-gray-600">
                            No Category
                        </span>
                    @endif
                </p>
            </div>
            <div>
                <span class="text-xs font-medium text-[#088395]/70 uppercase">URL</span>
                <p class="mt-1">
                    <a href="{{ $toolLink->url }}" target="_blank" class="text-sm text-[#088395] hover:text-[#37B7C3] break-all">{{ $toolLink->url }}</a>
                </p>
            </div>
            @if($toolLink->description)
            <div>
                <span class="text-xs font-medium text-[#088395]/70 uppercase">Description</span>
                <p class="mt-1 text-sm text-[#11224E]">{{ $toolLink->description }}</p>
            </div>
            @endif
            <div class="grid grid-cols-3 gap-4">
                <div>
                    <span class="text-xs font-medium text-[#088395]/70 uppercase">Order</span>
                    <p class="mt-1 text-sm text-[#11224E]">{{ $toolLink->order }}</p>
                </div>
                <div>
                    <span class="text-xs font-medium text-[#088395]/70 uppercase">Status</span>
                    <p class="mt-1">
                        @if($toolLink->is_active)
                        <span class="inline-flex items-center gap-1 rounded-full bg-green-50 px-2.5 py-0.5 text-xs font-medium text-green-600">Active</span>
                        @else
                        <span class="inline-flex items-center gap-1 rounded-full bg-gray-100 px-2.5 py-0.5 text-xs font-medium text-gray-600">Inactive</span>
                        @endif
                    </p>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

