@extends('admin.layouts.tailadmin')

@section('title', 'Create Template Category')

@section('content')
<div class="space-y-6">
    <div>
        <h2 class="text-2xl font-bold text-heading">Create Template Category</h2>
        <p class="text-sm text-brand-primary/70 mt-1">Group templates for easier discovery.</p>
    </div>

    <div class="rounded-xl border border-border-default bg-surface-1 p-6 shadow-sm">
        <form method="POST" action="{{ route('admin.template-categories.store') }}" class="space-y-6">
            @csrf

            <div>
                <label for="name" class="block text-sm font-medium text-heading mb-2">Name</label>
                <input id="name" name="name" value="{{ old('name') }}" required class="w-full rounded-lg border border-border-default px-4 py-2.5 text-sm text-heading focus:ring-2 focus:ring-[var(--brand-primary)]/20 focus:border-[var(--brand-primary)]" />
                @error('name')<p class="mt-1 text-xs text-red-600">{{ $message }}</p>@enderror
            </div>

            <div>
                <label for="description" class="block text-sm font-medium text-heading mb-2">Description</label>
                <textarea id="description" name="description" rows="3" class="w-full rounded-lg border border-border-default px-4 py-2.5 text-sm text-heading focus:ring-2 focus:ring-[var(--brand-primary)]/20 focus:border-[var(--brand-primary)]">{{ old('description') }}</textarea>
                @error('description')<p class="mt-1 text-xs text-red-600">{{ $message }}</p>@enderror
            </div>

            <div>
                <label for="is_active" class="block text-sm font-medium text-heading mb-2">Status</label>
                <select id="is_active" name="is_active" class="w-full rounded-lg border border-border-default px-4 py-2.5 text-sm text-heading">
                    <option value="1" {{ old('is_active', '1') == '1' ? 'selected' : '' }}>Active</option>
                    <option value="0" {{ old('is_active') == '0' ? 'selected' : '' }}>Inactive</option>
                </select>
            </div>

            <div class="flex justify-end gap-3 pt-4 border-t border-border-default">
                <a href="{{ route('admin.template-categories.index') }}" class="inline-flex items-center gap-2 rounded-lg border border-border-default px-6 py-2.5 text-sm font-medium text-heading hover:bg-brand-primary/5">Cancel</a>
                <button type="submit" class="inline-flex items-center gap-2 rounded-lg bg-brand-primary px-6 py-2.5 text-sm font-medium text-white hover:bg-[var(--brand-soft)]">
                    Save Category
                </button>
            </div>
        </form>
    </div>
</div>
@endsection

