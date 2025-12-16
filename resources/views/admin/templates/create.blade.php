@extends('admin.layouts.tailadmin')

@section('title', 'Create Template')

@section('content')
<div class="space-y-6">
    <div>
        <h2 class="text-2xl font-bold text-[#11224E]">Create Template</h2>
        <p class="text-sm text-[#088395]/70 mt-1">Upload a document/image or add a link resource.</p>
    </div>

    <div class="rounded-xl border border-[#088395]/20 bg-white p-6 shadow-sm">
        <form method="POST" action="{{ route('admin.templates.store') }}" enctype="multipart/form-data" class="space-y-6">
            @csrf

            <div class="grid grid-cols-1 gap-4 md:grid-cols-2">
                <div>
                    <label class="block text-sm font-medium text-[#11224E] mb-2">Category</label>
                    <select name="template_category_id" class="w-full rounded-lg border border-[#088395]/20 px-4 py-2.5 text-sm text-[#11224E]" required>
                        <option value="">Select category</option>
                        @foreach($categories as $category)
                        <option value="{{ $category->id }}" {{ old('template_category_id') == $category->id ? 'selected' : '' }}>
                            {{ $category->name }}
                        </option>
                        @endforeach
                    </select>
                    @error('template_category_id')<p class="mt-1 text-xs text-red-600">{{ $message }}</p>@enderror
                </div>
                <div>
                    <label class="block text-sm font-medium text-[#11224E] mb-2">Type</label>
                    <select name="type" class="w-full rounded-lg border border-[#088395]/20 px-4 py-2.5 text-sm text-[#11224E]" required>
                        @foreach(['document','image','link','other'] as $type)
                        <option value="{{ $type }}" {{ old('type') === $type ? 'selected' : '' }}>
                            {{ ucfirst($type) }}
                        </option>
                        @endforeach
                    </select>
                    @error('type')<p class="mt-1 text-xs text-red-600">{{ $message }}</p>@enderror
                </div>
            </div>

            <div>
                <label class="block text-sm font-medium text-[#11224E] mb-2">Title</label>
                <input name="title" value="{{ old('title') }}" required class="w-full rounded-lg border border-[#088395]/20 px-4 py-2.5 text-sm text-[#11224E]" />
                @error('title')<p class="mt-1 text-xs text-red-600">{{ $message }}</p>@enderror
            </div>

            <div>
                <label class="block text-sm font-medium text-[#11224E] mb-2">Description</label>
                <textarea name="description" rows="4" class="w-full rounded-lg border border-[#088395]/20 px-4 py-2.5 text-sm text-[#11224E]">{{ old('description') }}</textarea>
            </div>

            <div class="grid grid-cols-1 gap-4 md:grid-cols-2">
                <div>
                    <label class="block text-sm font-medium text-[#11224E] mb-2">Upload File (optional)</label>
                    <input type="file" name="file" class="w-full text-sm text-[#11224E]" />
                    <p class="text-xs text-[#088395]/70 mt-1">Max 10MB. Use for documents/images.</p>
                    @error('file')<p class="mt-1 text-xs text-red-600">{{ $message }}</p>@enderror
                </div>
                <div>
                    <label class="block text-sm font-medium text-[#11224E] mb-2">External URL (optional)</label>
                    <input type="url" name="external_url" value="{{ old('external_url') }}" class="w-full rounded-lg border border-[#088395]/20 px-4 py-2.5 text-sm text-[#11224E]" placeholder="https://..." />
                    @error('external_url')<p class="mt-1 text-xs text-red-600">{{ $message }}</p>@enderror
                </div>
            </div>

            <div>
                <label class="block text-sm font-medium text-[#11224E] mb-2">Status</label>
                <select name="is_active" class="w-full rounded-lg border border-[#088395]/20 px-4 py-2.5 text-sm text-[#11224E]">
                    <option value="1" {{ old('is_active', '1') == '1' ? 'selected' : '' }}>Active</option>
                    <option value="0" {{ old('is_active') == '0' ? 'selected' : '' }}>Inactive</option>
                </select>
            </div>

            <div class="flex justify-end gap-3 pt-4 border-t border-[#088395]/10">
                <a href="{{ route('admin.templates.index') }}" class="inline-flex items-center gap-2 rounded-lg border border-[#088395]/20 px-6 py-2.5 text-sm font-medium text-[#11224E] hover:bg-[#088395]/5">Cancel</a>
                <button type="submit" class="inline-flex items-center gap-2 rounded-lg bg-[#088395] px-6 py-2.5 text-sm font-medium text-white hover:bg-[#37B7C3]">
                    Save Template
                </button>
            </div>
        </form>
    </div>
</div>
@endsection

