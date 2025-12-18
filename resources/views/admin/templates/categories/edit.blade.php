@extends('admin.layouts.tailadmin')

@section('title', 'Edit Template Category')

@section('content')
<div class="space-y-6">
    <div>
        <h2 class="text-2xl font-bold text-heading">Edit Template Category</h2>
        <p class="text-sm text-brand-primary/70 mt-1">{{ $category->name }}</p>
    </div>

    <div class="rounded-xl border border-border-default bg-surface-1 p-6 shadow-sm">
        <form method="POST" action="{{ route('admin.template-categories.update', $category) }}" class="space-y-6">
            @csrf
            @method('PUT')

            <div>
                <label for="name" class="block text-sm font-medium text-heading mb-2">Name</label>
                <input id="name" name="name" value="{{ old('name', $category->name) }}" required class="w-full rounded-lg border border-border-default px-4 py-2.5 text-sm text-heading focus:ring-2 focus:ring-[var(--brand-primary)]/20 focus:border-[var(--brand-primary)]" />
                @error('name')<p class="mt-1 text-xs text-red-600">{{ $message }}</p>@enderror
            </div>

            <div>
                <label for="description" class="block text-sm font-medium text-heading mb-2">Description</label>
                <textarea id="description" name="description" rows="3" class="w-full rounded-lg border border-border-default px-4 py-2.5 text-sm text-heading focus:ring-2 focus:ring-[var(--brand-primary)]/20 focus:border-[var(--brand-primary)]">{{ old('description', $category->description) }}</textarea>
                @error('description')<p class="mt-1 text-xs text-red-600">{{ $message }}</p>@enderror
            </div>

            <div>
                <label for="is_active" class="block text-sm font-medium text-heading mb-2">Status</label>
                <select id="is_active" name="is_active" class="w-full rounded-lg border border-border-default px-4 py-2.5 text-sm text-heading">
                    <option value="1" {{ old('is_active', $category->is_active) == true ? 'selected' : '' }}>Active</option>
                    <option value="0" {{ old('is_active', $category->is_active) == false ? 'selected' : '' }}>Inactive</option>
                </select>
            </div>

            <div class="flex justify-end gap-3 pt-4 border-t border-border-default">
                <a href="{{ route('admin.template-categories.index') }}" class="inline-flex items-center gap-2 rounded-lg border border-border-default px-6 py-2.5 text-sm font-medium text-heading hover:bg-brand-primary/5">Cancel</a>
                <button type="submit" class="inline-flex items-center gap-2 rounded-lg bg-brand-primary px-6 py-2.5 text-sm font-medium text-white hover:bg-[var(--brand-soft)]">
                    Update Category
                </button>
            </div>
        </form>
    </div>
</div>
@endsection

