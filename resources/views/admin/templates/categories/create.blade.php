@extends('admin.layouts.tailadmin')

@section('title', 'Create Template Category')

@section('content')
<div class="space-y-6">
    <div>
        <h2 class="text-2xl font-bold text-[#11224E]">Create Template Category</h2>
        <p class="text-sm text-[#088395]/70 mt-1">Group templates for easier discovery.</p>
    </div>

    <div class="rounded-xl border border-[#088395]/20 bg-white p-6 shadow-sm">
        <form method="POST" action="{{ route('admin.template-categories.store') }}" class="space-y-6">
            @csrf

            <div>
                <label for="name" class="block text-sm font-medium text-[#11224E] mb-2">Name</label>
                <input id="name" name="name" value="{{ old('name') }}" required class="w-full rounded-lg border border-[#088395]/20 px-4 py-2.5 text-sm text-[#11224E] focus:ring-2 focus:ring-[#088395]/20 focus:border-[#088395]" />
                @error('name')<p class="mt-1 text-xs text-red-600">{{ $message }}</p>@enderror
            </div>

            <div>
                <label for="description" class="block text-sm font-medium text-[#11224E] mb-2">Description</label>
                <textarea id="description" name="description" rows="3" class="w-full rounded-lg border border-[#088395]/20 px-4 py-2.5 text-sm text-[#11224E] focus:ring-2 focus:ring-[#088395]/20 focus:border-[#088395]">{{ old('description') }}</textarea>
                @error('description')<p class="mt-1 text-xs text-red-600">{{ $message }}</p>@enderror
            </div>

            <div>
                <label for="is_active" class="block text-sm font-medium text-[#11224E] mb-2">Status</label>
                <select id="is_active" name="is_active" class="w-full rounded-lg border border-[#088395]/20 px-4 py-2.5 text-sm text-[#11224E]">
                    <option value="1" {{ old('is_active', '1') == '1' ? 'selected' : '' }}>Active</option>
                    <option value="0" {{ old('is_active') == '0' ? 'selected' : '' }}>Inactive</option>
                </select>
            </div>

            <div class="flex justify-end gap-3 pt-4 border-t border-[#088395]/10">
                <a href="{{ route('admin.template-categories.index') }}" class="inline-flex items-center gap-2 rounded-lg border border-[#088395]/20 px-6 py-2.5 text-sm font-medium text-[#11224E] hover:bg-[#088395]/5">Cancel</a>
                <button type="submit" class="inline-flex items-center gap-2 rounded-lg bg-[#088395] px-6 py-2.5 text-sm font-medium text-white hover:bg-[#37B7C3]">
                    Save Category
                </button>
            </div>
        </form>
    </div>
</div>
@endsection

