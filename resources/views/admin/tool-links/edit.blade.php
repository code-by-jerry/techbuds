@extends('admin.layouts.tailadmin')

@section('title', 'Edit Tool Link')

@section('content')
<div class="space-y-6">
    <!-- Header -->
    <div class="flex items-center justify-between">
        <div>
            <h2 class="text-2xl font-bold text-heading">Edit Link</h2>
            <p class="text-sm text-text-secondary mt-1">Update link information</p>
        </div>
        <a href="{{ route('admin.tool-links.index') }}" class="inline-flex items-center gap-2 rounded-lg border border-border-default px-4 py-2 text-sm font-medium text-brand-primary transition-colors hover:bg-brand-primary/5">
            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
            </svg>
            Cancel
        </a>
    </div>

    <!-- Form -->
    <form action="{{ route('admin.tool-links.update', $toolLink) }}" method="POST" class="space-y-6">
        @csrf
        @method('PUT')

        <div class="rounded-2xl border border-border-default bg-surface-1 p-6 shadow-sm">
            <h3 class="mb-4 text-lg font-semibold text-heading">Link Information</h3>
            <div class="space-y-4">
                <!-- Category -->
                <div>
                    <label for="tool_category_id" class="mb-1 block text-sm font-medium text-heading">Category <span class="text-red-500">*</span></label>
                    <select
                        id="tool_category_id"
                        name="tool_category_id"
                        required
                        class="w-full rounded-lg border border-border-default bg-surface-2 px-3 py-2 text-sm text-heading focus:border-brand-primary focus:outline-none focus:ring-2 focus:ring-brand-primary/20"
                    >
                        <option value="">Select a category</option>
                        @foreach($categories as $category)
                        <option value="{{ $category->id }}" {{ old('tool_category_id', $toolLink->tool_category_id) == $category->id ? 'selected' : '' }}>{{ $category->name }}</option>
                        @endforeach
                    </select>
                    @error('tool_category_id')
                    <p class="mt-1 text-xs text-error">{{ $message }}</p>
                    @enderror
                </div>

                <!-- Title -->
                <div>
                    <label for="title" class="mb-1 block text-sm font-medium text-heading">Title <span class="text-red-500">*</span></label>
                    <input
                        type="text"
                        id="title"
                        name="title"
                        value="{{ old('title', $toolLink->title) }}"
                        required
                        class="w-full rounded-lg border border-border-default bg-surface-2 px-3 py-2 text-sm text-heading focus:border-brand-primary focus:outline-none focus:ring-2 focus:ring-brand-primary/20"
                        placeholder="e.g., MDN Web Docs"
                    />
                    @error('title')
                    <p class="mt-1 text-xs text-error">{{ $message }}</p>
                    @enderror
                </div>

                <!-- URL -->
                <div>
                    <label for="url" class="mb-1 block text-sm font-medium text-heading">URL <span class="text-red-500">*</span></label>
                    <input
                        type="url"
                        id="url"
                        name="url"
                        value="{{ old('url', $toolLink->url) }}"
                        required
                        class="w-full rounded-lg border border-border-default bg-surface-2 px-3 py-2 text-sm text-heading focus:border-brand-primary focus:outline-none focus:ring-2 focus:ring-brand-primary/20"
                        placeholder="https://example.com"
                    />
                    @error('url')
                    <p class="mt-1 text-xs text-error">{{ $message }}</p>
                    @enderror
                </div>

                <!-- Description -->
                <div>
                    <label for="description" class="mb-1 block text-sm font-medium text-heading">Description</label>
                    <textarea
                        id="description"
                        name="description"
                        rows="3"
                        class="w-full rounded-lg border border-border-default bg-surface-2 px-3 py-2 text-sm text-heading focus:border-brand-primary focus:outline-none focus:ring-2 focus:ring-brand-primary/20"
                        placeholder="Brief description of the tool"
                    >{{ old('description', $toolLink->description) }}</textarea>
                    @error('description')
                    <p class="mt-1 text-xs text-error">{{ $message }}</p>
                    @enderror
                </div>

                <!-- Order -->
                <div>
                    <label for="order" class="mb-1 block text-sm font-medium text-heading">Order</label>
                    <input
                        type="number"
                        id="order"
                        name="order"
                        value="{{ old('order', $toolLink->order) }}"
                        min="0"
                        class="w-full rounded-lg border border-border-default bg-surface-2 px-3 py-2 text-sm text-heading focus:border-brand-primary focus:outline-none focus:ring-2 focus:ring-brand-primary/20"
                        placeholder="0"
                    />
                    <p class="mt-1 text-xs text-text-secondary">Lower numbers appear first</p>
                    @error('order')
                    <p class="mt-1 text-xs text-error">{{ $message }}</p>
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
                        {{ old('is_active', $toolLink->is_active) ? 'checked' : '' }}
                        class="h-4 w-4 rounded border-border-default text-brand-primary focus:ring-brand-primary/20"
                    />
                    <span class="text-sm font-medium text-heading">Active (visible on website)</span>
                </label>
            </div>
        </div>

        <!-- Form Actions -->
        <div class="flex items-center justify-end gap-3">
            <a href="{{ route('admin.tool-links.index') }}" class="rounded-lg border border-border-default px-4 py-2 text-sm font-medium text-brand-primary transition-colors hover:bg-brand-primary/5">
                Cancel
            </a>
            <button type="submit" class="rounded-lg bg-brand-primary px-6 py-2 text-sm font-medium text-white transition-colors hover:bg-brand-hover">
                Update Link
            </button>
        </div>
    </form>
</div>
@endsection

