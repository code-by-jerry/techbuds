@extends('admin.layouts.tailadmin')

@section('title', 'Create Blog')


@section('content')
<div class="space-y-6">
    <!-- Header -->
    <div class="flex items-center justify-between">
        <div>
            <h2 class="text-2xl font-bold text-[#11224E]">Create New Blog</h2>
            <p class="text-sm text-[#088395]/70 mt-1">Add a new SEO blog article</p>
        </div>
        <a href="{{ route('admin.blogs.index') }}" class="inline-flex items-center gap-2 rounded-lg border border-[#088395]/20 px-4 py-2 text-sm font-medium text-[#088395] transition-colors hover:bg-[#088395]/5">
            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
            </svg>
            Cancel
        </a>
    </div>

    <!-- Form -->
    <form action="{{ route('admin.blogs.store') }}" method="POST" class="space-y-6">
        @csrf
        @include('admin.blogs.form', ['blog' => null])
    </form>
</div>
@endsection

