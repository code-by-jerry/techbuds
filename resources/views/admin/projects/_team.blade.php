<div class="space-y-4">
    <!-- Header -->
    <div class="flex items-center justify-between">
        <h4 class="text-lg font-semibold text-[#11224E]">Team Members</h4>
        <button onclick="document.getElementById('team-assignment-form').classList.toggle('hidden')" class="inline-flex items-center gap-2 rounded-lg bg-[#088395] px-4 py-2 text-sm font-medium text-white transition-colors hover:bg-[#37B7C3]">
            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4" />
            </svg>
            Assign Team
        </button>
    </div>

    <!-- Team Assignment Form -->
    <div id="team-assignment-form" class="hidden rounded-2xl border border-[#088395]/10 bg-white p-6 shadow-sm">
        <form action="{{ route('admin.projects.assign-team', $project) }}" method="POST" x-data="{ teamMembers: @js($project->teamMembers->map(fn($m) => ['admin_id' => $m->id, 'role' => $m->pivot->role])->toArray()) }">
            @csrf
            <div class="space-y-4">
                <h5 class="font-semibold text-[#11224E]">Assign Team Members</h5>
                
                <div class="space-y-3">
                    <template x-for="(member, index) in teamMembers" :key="index">
                        <div class="flex items-center gap-3 rounded-lg border border-[#088395]/10 bg-white p-3">
                            <div class="flex-1 grid grid-cols-2 gap-3">
                                <div>
                                    <select 
                                        x-model="member.admin_id"
                                        :name="`team_members[${index}][admin_id]`"
                                        required
                                        class="w-full rounded-lg border border-[#088395]/15 px-3 py-2 text-sm text-[#11224E] focus:border-[#088395] focus:outline-none focus:ring-2 focus:ring-[#088395]/20"
                                    >
                                        <option value="">Select Member</option>
                                        @foreach($admins as $admin)
                                        <option value="{{ $admin->id }}">{{ $admin->name }}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div>
                                    <select 
                                        x-model="member.role"
                                        :name="`team_members[${index}][role]`"
                                        required
                                        class="w-full rounded-lg border border-[#088395]/15 px-3 py-2 text-sm text-[#11224E] focus:border-[#088395] focus:outline-none focus:ring-2 focus:ring-[#088395]/20"
                                    >
                                        <option value="developer">Developer</option>
                                        <option value="lead">Lead</option>
                                        <option value="designer">Designer</option>
                                        <option value="tester">Tester</option>
                                        <option value="manager">Manager</option>
                                    </select>
                                </div>
                            </div>
                            <button 
                                type="button"
                                @click="teamMembers.splice(index, 1)"
                                class="text-red-600 hover:text-red-700"
                            >
                                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16" />
                                </svg>
                            </button>
                        </div>
                    </template>
                    <button 
                        type="button"
                        @click="teamMembers.push({ admin_id: '', role: 'developer' })"
                        class="w-full rounded-lg border border-[#088395]/20 bg-white px-4 py-2 text-sm font-medium text-[#088395] transition-colors hover:bg-[#088395]/5"
                    >
                        + Add Team Member
                    </button>
                </div>

                <div class="flex items-center justify-end gap-3">
                    <button 
                        type="button"
                        onclick="document.getElementById('team-assignment-form').classList.add('hidden')"
                        class="rounded-lg border border-[#088395]/20 px-4 py-2 text-sm font-medium text-[#088395] transition-colors hover:bg-[#088395]/5"
                    >
                        Cancel
                    </button>
                    <button type="submit" class="rounded-lg bg-[#088395] px-6 py-2 text-sm font-medium text-white transition-colors hover:bg-[#37B7C3]">
                        Save Team
                    </button>
                </div>
            </div>
        </form>
    </div>

    <!-- Team Members List -->
    @if($project->teamMembers->count() > 0)
    <div class="space-y-3">
        @foreach($project->teamMembers as $member)
        <div class="flex items-center justify-between rounded-lg border border-[#088395]/10 bg-white p-4">
            <div class="flex items-center gap-3">
                <div class="flex h-10 w-10 items-center justify-center rounded-full bg-gradient-to-br from-[#088395] to-[#37B7C3]">
                    <span class="text-sm font-semibold text-white">{{ strtoupper(substr($member->name, 0, 1)) }}</span>
                </div>
                <div>
                    <p class="font-medium text-[#11224E]">{{ $member->name }}</p>
                    <p class="text-xs text-[#088395]/70">{{ $member->email }}</p>
                </div>
            </div>
            <div class="flex items-center gap-2">
                @php
                    $roleColors = [
                        'lead' => 'bg-purple-50 text-purple-600',
                        'developer' => 'bg-blue-50 text-blue-600',
                        'designer' => 'bg-pink-50 text-pink-600',
                        'tester' => 'bg-green-50 text-green-600',
                        'manager' => 'bg-orange-50 text-orange-600',
                    ];
                    $roleColor = $roleColors[$member->pivot->role] ?? 'bg-gray-50 text-gray-600';
                @endphp
                <span class="inline-flex items-center rounded-full px-2.5 py-0.5 text-xs font-medium {{ $roleColor }}">
                    {{ ucfirst($member->pivot->role) }}
                </span>
            </div>
        </div>
        @endforeach
    </div>
    @else
    <div class="rounded-lg border border-[#088395]/10 bg-white p-8 text-center">
        <svg class="mx-auto h-12 w-12 text-[#088395]/30" fill="none" stroke="currentColor" viewBox="0 0 24 24">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 20h5v-2a3 3 0 00-5.356-1.857M17 20H7m10 0v-2c0-.656-.126-1.283-.356-1.857M7 20H2v-2a3 3 0 015.356-1.857M7 20v-2c0-.656.126-1.283.356-1.857m0 0a5.002 5.002 0 019.288 0M15 7a3 3 0 11-6 0 3 3 0 016 0zm6 3a2 2 0 11-4 0 2 2 0 014 0zM7 10a2 2 0 11-4 0 2 2 0 014 0z" />
        </svg>
        <h3 class="mt-4 text-sm font-medium text-[#11224E]">No team members assigned</h3>
        <p class="mt-2 text-sm text-[#088395]/70">Assign team members to this project.</p>
    </div>
    @endif
</div>

