@extends('admin.layouts.tailadmin')

@section('title', 'Edit Project Update')

@section('content')
<div class="space-y-6">
    <!-- Header -->
    <div class="flex items-center justify-between">
        <div>
            <div class="flex items-center gap-3">
                <a href="{{ route('admin.projects.show', $project) }}" class="text-[#088395] hover:text-[#37B7C3] transition-colors">
                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 19l-7-7m0 0l7-7m-7 7h18" />
                    </svg>
                </a>
                <h2 class="text-2xl font-bold text-[#11224E]">Edit Project Update</h2>
            </div>
            <p class="text-sm text-[#088395]/70 mt-1">Update communication entry for {{ $project->title }}</p>
        </div>
    </div>

    <!-- Form -->
    <form action="{{ route('admin.project-updates.update', $projectUpdate) }}" method="POST" class="space-y-6">
        @csrf
        @method('PUT')

        <div class="rounded-2xl border border-[#088395]/10 bg-white p-6 shadow-sm">
            <h3 class="mb-4 text-lg font-semibold text-[#11224E]">Update Information</h3>
            <div class="space-y-4">
                <!-- Type -->
                <div>
                    <label for="type" class="mb-1 block text-sm font-medium text-[#11224E]">Type <span class="text-red-500">*</span></label>
                    <select
                        id="type"
                        name="type"
                        required
                        class="w-full rounded-lg border border-[#088395]/15 px-3 py-2 text-sm text-[#11224E] focus:border-[#088395] focus:outline-none focus:ring-2 focus:ring-[#088395]/20"
                    >
                        <option value="internal_note" {{ old('type', $projectUpdate->type) === 'internal_note' ? 'selected' : '' }}>Internal Note</option>
                        <option value="client_message" {{ old('type', $projectUpdate->type) === 'client_message' ? 'selected' : '' }}>Client Message</option>
                        <option value="change_request" {{ old('type', $projectUpdate->type) === 'change_request' ? 'selected' : '' }}>Change Request</option>
                        <option value="meeting_note" {{ old('type', $projectUpdate->type) === 'meeting_note' ? 'selected' : '' }}>Meeting Note</option>
                        <option value="decision" {{ old('type', $projectUpdate->type) === 'decision' ? 'selected' : '' }}>Decision</option>
                    </select>
                    @error('type')
                    <p class="mt-1 text-xs text-red-600">{{ $message }}</p>
                    @enderror
                </div>

                <!-- Message -->
                <div>
                    <label for="message" class="mb-1 block text-sm font-medium text-[#11224E]">Message <span class="text-red-500">*</span></label>
                    <textarea
                        id="message"
                        name="message"
                        rows="6"
                        required
                        class="w-full rounded-lg border border-[#088395]/15 px-3 py-2 text-sm text-[#11224E] focus:border-[#088395] focus:outline-none focus:ring-2 focus:ring-[#088395]/20"
                    >{{ old('message', $projectUpdate->message) }}</textarea>
                    @error('message')
                    <p class="mt-1 text-xs text-red-600">{{ $message }}</p>
                    @enderror
                </div>

                <!-- Is Important -->
                <div>
                    <label class="flex items-center gap-3 cursor-pointer">
                        <input
                            type="hidden"
                            name="is_important"
                            value="0"
                        />
                        <input
                            type="checkbox"
                            name="is_important"
                            value="1"
                            {{ old('is_important', $projectUpdate->is_important) ? 'checked' : '' }}
                            class="h-4 w-4 rounded border-[#088395]/20 text-[#088395] focus:ring-[#088395]/20"
                        />
                        <span class="text-sm font-medium text-[#11224E]">Mark as Important</span>
                    </label>
                </div>

                <!-- Existing Attachments -->
                @if($projectUpdate->attachments && count($projectUpdate->attachments) > 0)
                <div>
                    <label class="mb-1 block text-sm font-medium text-[#11224E]">Existing Attachments</label>
                    <div class="space-y-2">
                        @foreach($projectUpdate->attachments as $index => $attachment)
                        <div class="flex items-center justify-between rounded-lg border border-[#088395]/10 bg-white px-3 py-2">
                            <div class="flex items-center gap-2">
                                <svg class="w-4 h-4 text-[#088395]" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15.172 7l-6.586 6.586a2 2 0 102.828 2.828l6.414-6.586a4 4 0 00-5.656-5.656l-6.415 6.585a6 6 0 108.486 8.486L20.5 13" />
                                </svg>
                                <span class="text-sm text-[#11224E]">{{ $attachment['name'] ?? 'Attachment' }}</span>
                            </div>
                            <a href="{{ route('admin.project-updates.download-attachment', [$projectUpdate, $index]) }}" class="text-[#088395] hover:text-[#37B7C3] text-xs">
                                Download
                            </a>
                        </div>
                        @endforeach
                    </div>
                    <p class="mt-2 text-xs text-[#088395]/70">Note: You cannot modify attachments. Delete and recreate the update to change attachments.</p>
                </div>
                @endif
            </div>
        </div>

        <!-- Form Actions -->
        <div class="flex items-center justify-end gap-3">
            <a href="{{ route('admin.projects.show', $project) }}" class="rounded-lg border border-[#088395]/20 px-4 py-2 text-sm font-medium text-[#088395] transition-colors hover:bg-[#088395]/5">
                Cancel
            </a>
            <button type="submit" class="rounded-lg bg-[#088395] px-6 py-2 text-sm font-medium text-white transition-colors hover:bg-[#37B7C3]">
                Update Entry
            </button>
        </div>
    </form>
</div>
@endsection

