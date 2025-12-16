@extends('admin.layouts.tailadmin')

@section('title', 'Create Tool Link')

@section('content')
<div class="space-y-6">
    <!-- Header -->
    <div class="flex items-center justify-between">
        <div>
            <h2 class="text-2xl font-bold text-[#11224E]">Create New Link</h2>
            <p class="text-sm text-[#088395]/70 mt-1">Add a new devtools link</p>
        </div>
        <a href="{{ route('admin.tool-links.index') }}" class="inline-flex items-center gap-2 rounded-lg border border-[#088395]/20 px-4 py-2 text-sm font-medium text-[#088395] transition-colors hover:bg-[#088395]/5">
            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
            </svg>
            Cancel
        </a>
    </div>

    <!-- Form -->
    <form action="{{ route('admin.tool-links.store') }}" method="POST" class="space-y-6">
        @csrf

        <div class="rounded-2xl border border-[#088395]/10 bg-white p-6 shadow-sm">
            <h3 class="mb-4 text-lg font-semibold text-[#11224E]">Link Information</h3>
            <div class="space-y-4">
                <!-- Category -->
                <div>
                    <label for="tool_category_id" class="mb-1 block text-sm font-medium text-[#11224E]">Category <span class="text-red-500">*</span></label>
                    <select
                        id="tool_category_id"
                        name="tool_category_id"
                        required
                        class="w-full rounded-lg border border-[#088395]/15 px-3 py-2 text-sm text-[#11224E] focus:border-[#088395] focus:outline-none focus:ring-2 focus:ring-[#088395]/20"
                    >
                        <option value="">Select a category</option>
                        @foreach($categories as $category)
                        <option value="{{ $category->id }}" {{ old('tool_category_id', request('category_id')) == $category->id ? 'selected' : '' }}>{{ $category->name }}</option>
                        @endforeach
                    </select>
                    @error('tool_category_id')
                    <p class="mt-1 text-xs text-red-600">{{ $message }}</p>
                    @enderror
                </div>

                <!-- Title -->
                <div>
                    <label for="title" class="mb-1 block text-sm font-medium text-[#11224E]">Title <span class="text-red-500">*</span></label>
                    <input
                        type="text"
                        id="title"
                        name="title"
                        value="{{ old('title') }}"
                        required
                        class="w-full rounded-lg border border-[#088395]/15 px-3 py-2 text-sm text-[#11224E] focus:border-[#088395] focus:outline-none focus:ring-2 focus:ring-[#088395]/20"
                        placeholder="e.g., MDN Web Docs"
                    />
                    @error('title')
                    <p class="mt-1 text-xs text-red-600">{{ $message }}</p>
                    @enderror
                </div>

                <!-- URL -->
                <div>
                    <label for="url" class="mb-1 block text-sm font-medium text-[#11224E]">URL <span class="text-red-500">*</span></label>
                    <input
                        type="url"
                        id="url"
                        name="url"
                        value="{{ old('url') }}"
                        required
                        class="w-full rounded-lg border border-[#088395]/15 px-3 py-2 text-sm text-[#11224E] focus:border-[#088395] focus:outline-none focus:ring-2 focus:ring-[#088395]/20"
                        placeholder="https://example.com"
                    />
                    @error('url')
                    <p class="mt-1 text-xs text-red-600">{{ $message }}</p>
                    @enderror
                </div>

                <!-- Description -->
                <div>
                    <label for="description" class="mb-1 block text-sm font-medium text-[#11224E]">Description</label>
                    <textarea
                        id="description"
                        name="description"
                        rows="3"
                        class="w-full rounded-lg border border-[#088395]/15 px-3 py-2 text-sm text-[#11224E] focus:border-[#088395] focus:outline-none focus:ring-2 focus:ring-[#088395]/20"
                        placeholder="Brief description of the tool"
                    >{{ old('description') }}</textarea>
                    @error('description')
                    <p class="mt-1 text-xs text-red-600">{{ $message }}</p>
                    @enderror
                </div>

                <!-- Order -->
                <div>
                    <label for="order" class="mb-1 block text-sm font-medium text-[#11224E]">Order</label>
                    <input
                        type="number"
                        id="order"
                        name="order"
                        value="{{ old('order', 0) }}"
                        min="0"
                        class="w-full rounded-lg border border-[#088395]/15 px-3 py-2 text-sm text-[#11224E] focus:border-[#088395] focus:outline-none focus:ring-2 focus:ring-[#088395]/20"
                        placeholder="0"
                    />
                    <p class="mt-1 text-xs text-[#088395]/70">Lower numbers appear first</p>
                    @error('order')
                    <p class="mt-1 text-xs text-red-600">{{ $message }}</p>
                    @enderror
                </div>

                <!-- Is Active -->
                <label class="flex items-center gap-3 cursor-pointer">
                    <input
                        type="hidden"
                        name="is_active"
                        value="0"
                    />
                    <input
                        type="checkbox"
                        name="is_active"
                        value="1"
                        {{ old('is_active', true) ? 'checked' : '' }}
                        class="h-4 w-4 rounded border-[#088395]/20 text-[#088395] focus:ring-[#088395]/20"
                    />
                    <span class="text-sm font-medium text-[#11224E]">Active (visible on website)</span>
                </label>
            </div>
        </div>

        <!-- Form Actions -->
        <div class="flex items-center justify-end gap-3">
            <a href="{{ route('admin.tool-links.index') }}" class="rounded-lg border border-[#088395]/20 px-4 py-2 text-sm font-medium text-[#088395] transition-colors hover:bg-[#088395]/5">
                Cancel
            </a>
            <button type="submit" class="rounded-lg bg-[#088395] px-6 py-2 text-sm font-medium text-white transition-colors hover:bg-[#37B7C3]">
                Create Link
            </button>
        </div>
    </form>
</div>
@endsection

