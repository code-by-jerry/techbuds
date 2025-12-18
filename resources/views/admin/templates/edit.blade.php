@extends('admin.layouts.tailadmin')

@section('title', 'Edit Template')

@section('content')
<div class="space-y-6">
    <div>
        <h2 class="text-2xl font-bold text-heading">Edit Template</h2>
        <p class="text-sm text-text-secondary mt-1">{{ $template->title }}</p>
    </div>

    <div class="rounded-xl border border-border-default bg-surface-1 p-6 shadow-sm">
        <form method="POST" action="{{ route('admin.templates.update', $template) }}" enctype="multipart/form-data" class="space-y-6">
            @csrf
            @method('PUT')

            <div class="grid grid-cols-1 gap-4 md:grid-cols-2">
                <div>
                    <label class="block text-sm font-medium text-heading mb-2">Category</label>
                    <select name="template_category_id" class="w-full rounded-lg border border-border-default px-4 py-2.5 text-sm text-heading" required>
                        @foreach($categories as $category)
                        <option value="{{ $category->id }}" {{ old('template_category_id', $template->template_category_id) == $category->id ? 'selected' : '' }}>
                            {{ $category->name }}
                        </option>
                        @endforeach
                    </select>
                </div>
                <div>
                    <label class="block text-sm font-medium text-heading mb-2">Type</label>
                    <select name="type" class="w-full rounded-lg border border-border-default px-4 py-2.5 text-sm text-heading" required>
                        @foreach(['document','image','link','other'] as $type)
                        <option value="{{ $type }}" {{ old('type', $template->type) === $type ? 'selected' : '' }}>
                            {{ ucfirst($type) }}
                        </option>
                        @endforeach
                    </select>
                </div>
            </div>

            <div>
                <label class="block text-sm font-medium text-heading mb-2">Title</label>
                <input name="title" value="{{ old('title', $template->title) }}" required class="w-full rounded-lg border border-border-default px-4 py-2.5 text-sm text-heading" />
            </div>

            <div>
                <label class="block text-sm font-medium text-heading mb-2">Description</label>
                <textarea name="description" rows="4" class="w-full rounded-lg border border-border-default px-4 py-2.5 text-sm text-heading">{{ old('description', $template->description) }}</textarea>
            </div>

            <div class="grid grid-cols-1 gap-4 md:grid-cols-2">
                <div>
                    <label class="block text-sm font-medium text-heading mb-2">Upload File (optional)</label>
                    <input type="file" name="file" class="w-full text-sm text-heading" />
                    @if($template->file_path)
                        <p class="text-xs text-text-secondary mt-1">Existing file: <a href="{{ route('admin.templates.download', $template) }}" class="text-brand-primary underline">Download</a></p>
                    @endif
                </div>
                <div>
                    <label class="block text-sm font-medium text-heading mb-2">External URL (optional)</label>
                    <input type="url" name="external_url" value="{{ old('external_url', $template->external_url) }}" class="w-full rounded-lg border border-border-default px-4 py-2.5 text-sm text-heading" />
                </div>
            </div>

            <div>
                <label class="block text-sm font-medium text-heading mb-2">Status</label>
                <select name="is_active" class="w-full rounded-lg border border-border-default px-4 py-2.5 text-sm text-heading">
                    <option value="1" {{ old('is_active', $template->is_active) == true ? 'selected' : '' }}>Active</option>
                    <option value="0" {{ old('is_active', $template->is_active) == false ? 'selected' : '' }}>Inactive</option>
                </select>
            </div>

            <div class="flex justify-end gap-3 pt-4 border-t border-border-default">
                <a href="{{ route('admin.templates.index') }}" class="inline-flex items-center gap-2 rounded-lg border border-border-default px-6 py-2.5 text-sm font-medium text-heading hover:bg-brand-primary/5">Cancel</a>
                <button type="submit" class="inline-flex items-center gap-2 rounded-lg bg-brand-primary px-6 py-2.5 text-sm font-medium text-white hover:bg-brand-hover">
                    Update Template
                </button>
            </div>
        </form>
    </div>
</div>
@endsection

