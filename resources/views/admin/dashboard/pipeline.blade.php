@extends('admin.layouts.tailadmin')

@section('title', 'Client Pipeline')

@section('content')
<div class="space-y-6">
    <!-- Page Header -->
    <div class="flex items-center justify-between">
        <div>
            <h1 class="text-2xl font-bold text-[#11224E]">Client Pipeline</h1>
            <p class="text-sm text-[#088395]/70 mt-1">Drag and drop clients to update their status</p>
        </div>
        <a href="{{ route('admin.dashboard') }}" class="inline-flex items-center gap-2 rounded-lg border border-[#088395]/20 px-4 py-2 text-sm font-medium text-[#088395] transition-colors hover:bg-[#088395]/5">
            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 19v-6a2 2 0 00-2-2H5a2 2 0 00-2 2v6a2 2 0 002 2h2a2 2 0 002-2zm0 0V9a2 2 0 012-2h2a2 2 0 012 2v10m-6 0a2 2 0 002 2h2a2 2 0 002-2m0 0V5a2 2 0 012-2h2a2 2 0 012 2v14a2 2 0 01-2 2h-2a2 2 0 01-2-2z" />
            </svg>
            Back to Dashboard
        </a>
    </div>

    <!-- Pipeline Kanban -->
    <div class="overflow-x-auto">
        <div class="flex gap-4 min-w-max pb-4" x-data="pipelineKanban()">
            @foreach($statusOrder as $status)
            @php
                $statusLabels = [
                    'discovery' => 'Discovery',
                    'proposal_sent' => 'Proposal Sent',
                    'proposal_accepted' => 'Proposal Accepted',
                    'onboarding' => 'Onboarding',
                    'project_started' => 'Project Started',
                    'in_development' => 'In Development',
                    'in_testing' => 'In Testing',
                    'invoice_sent' => 'Invoice Sent',
                    'paid' => 'Paid',
                    'offboarding' => 'Offboarding',
                    'completed' => 'Completed',
                    'archived' => 'Archived'
                ];
                $statusLabel = $statusLabels[$status] ?? ucfirst(str_replace('_', ' ', $status));
                $clients = $clientsByStatus->get($status, collect());
            @endphp
            <div class="flex-shrink-0 w-80">
                <div class="rounded-lg border border-[#088395]/10 bg-[#088395]/5 p-4">
                    <div class="mb-4 flex items-center justify-between">
                        <h3 class="font-semibold text-[#11224E]">{{ $statusLabel }}</h3>
                        <span class="rounded-full bg-white px-2.5 py-0.5 text-xs font-medium text-[#088395]">{{ $clients->count() }}</span>
                    </div>
                    <div 
                        class="space-y-3 min-h-[200px]"
                        x-data="{ status: '{{ $status }}' }"
                        @drop.prevent="handleDrop($event, status)"
                        @dragover.prevent="handleDragOver($event)"
                        @dragenter.prevent="handleDragEnter($event)"
                        @dragleave.prevent="handleDragLeave($event)"
                    >
                        @foreach($clients as $client)
                        <div
                            draggable="true"
                            @dragstart="handleDragStart($event, {{ $client->id }}, '{{ $client->status }}')"
                            @dragend="handleDragEnd($event)"
                            class="cursor-move rounded-lg border border-[#088395]/10 bg-white p-4 shadow-sm hover:shadow-md transition-all hover:border-[#088395]/30"
                        >
                            <div class="flex items-start justify-between">
                                <div class="flex-1">
                                    <h4 class="font-medium text-[#11224E]">{{ $client->name }}</h4>
                                    @if($client->company)
                                    <p class="mt-1 text-xs text-[#088395]/70">{{ $client->company }}</p>
                                    @endif
                                    @if($client->email)
                                    <p class="mt-1 text-xs text-[#088395]/70">{{ $client->email }}</p>
                                    @endif
                                    @if($client->projects->count() > 0)
                                    <div class="mt-2 flex items-center gap-2">
                                        <svg class="w-4 h-4 text-[#088395]" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5H7a2 2 0 00-2 2v12a2 2 0 002 2h10a2 2 0 002-2V7a2 2 0 00-2-2h-2M9 5a2 2 0 002 2h2a2 2 0 002-2M9 5a2 2 0 012-2h2a2 2 0 012 2" />
                                        </svg>
                                        <span class="text-xs text-[#088395]/70">{{ $client->projects->count() }} project(s)</span>
                                    </div>
                                    @endif
                                </div>
                                <a href="{{ route('admin.clients.show', $client) }}" class="ml-2 text-[#088395] hover:text-[#37B7C3]">
                                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z" />
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z" />
                                    </svg>
                                </a>
                            </div>
                        </div>
                        @endforeach
                        @if($clients->count() === 0)
                        <div class="flex items-center justify-center min-h-[100px] text-sm text-[#088395]/50">
                            No clients
                        </div>
                        @endif
                    </div>
                </div>
            </div>
            @endforeach
        </div>
    </div>
</div>

<script>
function pipelineKanban() {
    return {
        draggedClientId: null,
        draggedFromStatus: null,
        dragOverColumn: null,

        handleDragStart(event, clientId, currentStatus) {
            this.draggedClientId = clientId;
            this.draggedFromStatus = currentStatus;
            event.dataTransfer.effectAllowed = 'move';
            event.currentTarget.style.opacity = '0.5';
        },

        handleDragEnd(event) {
            event.currentTarget.style.opacity = '1';
            if (this.dragOverColumn) {
                this.dragOverColumn.classList.remove('border-[#088395]', 'bg-[#088395]/10');
            }
        },

        handleDragOver(event) {
            event.preventDefault();
            event.dataTransfer.dropEffect = 'move';
        },

        handleDragEnter(event) {
            event.preventDefault();
            const column = event.currentTarget.closest('[x-data*="status"]');
            if (column && column !== this.dragOverColumn) {
                if (this.dragOverColumn) {
                    this.dragOverColumn.classList.remove('border-[#088395]', 'bg-[#088395]/10');
                }
                this.dragOverColumn = column;
                column.classList.add('border-[#088395]', 'bg-[#088395]/10');
            }
        },

        handleDragLeave(event) {
            // Only remove highlight if leaving the column entirely
            const column = event.currentTarget.closest('[x-data*="status"]');
            if (column && !column.contains(event.relatedTarget)) {
                column.classList.remove('border-[#088395]', 'bg-[#088395]/10');
                if (this.dragOverColumn === column) {
                    this.dragOverColumn = null;
                }
            }
        },

        async handleDrop(event, newStatus) {
            event.preventDefault();
            
            if (this.dragOverColumn) {
                this.dragOverColumn.classList.remove('border-[#088395]', 'bg-[#088395]/10');
            }

            if (!this.draggedClientId || this.draggedFromStatus === newStatus) {
                return;
            }

            try {
                const csrfToken = document.querySelector('meta[name="csrf-token"]')?.content;
                if (!csrfToken) {
                    alert('CSRF token not found. Please refresh the page.');
                    return;
                }

                const response = await fetch(`/admin/clients/${this.draggedClientId}/update-status`, {
                    method: 'POST',
                    headers: {
                        'Content-Type': 'application/json',
                        'Accept': 'application/json',
                        'X-CSRF-TOKEN': csrfToken,
                        'X-Requested-With': 'XMLHttpRequest'
                    },
                    body: JSON.stringify({ status: newStatus }),
                    credentials: 'same-origin'
                });

                // Check if response is ok
                if (!response.ok) {
                    // Try to parse error response
                    let errorMessage = `Failed to update client status (${response.status})`;
                    const contentType = response.headers.get('content-type');
                    
                    if (contentType && contentType.includes('application/json')) {
                        try {
                            const errorData = await response.json();
                            errorMessage = errorData.message || errorData.error || errorMessage;
                            if (errorData.errors) {
                                errorMessage += ': ' + Object.values(errorData.errors).flat().join(', ');
                            }
                        } catch (e) {
                            console.error('Error parsing JSON:', e);
                            errorMessage = `Server error (${response.status}): ${response.statusText}`;
                        }
                    } else {
                        // Response is not JSON, might be HTML error page
                        const text = await response.text();
                        console.error('Non-JSON response:', text.substring(0, 200));
                        errorMessage = `Server error (${response.status}): ${response.statusText}. Check console for details.`;
                    }
                    alert(errorMessage);
                    return;
                }

                // Parse successful response
                let data;
                try {
                    const contentType = response.headers.get('content-type');
                    if (contentType && contentType.includes('application/json')) {
                        data = await response.json();
                    } else {
                        // If response is not JSON, treat as success and reload
                        console.warn('Response is not JSON, reloading page anyway');
                        window.location.reload();
                        return;
                    }
                } catch (e) {
                    console.error('Error parsing response:', e);
                    alert('Error parsing server response. Please refresh the page.');
                    return;
                }

                if (data.success) {
                    // Reload page to reflect changes
                    window.location.reload();
                } else {
                    alert(data.message || 'Failed to update client status');
                }
            } catch (error) {
                console.error('Error:', error);
                alert('An error occurred while updating client status: ' + (error.message || 'Unknown error'));
            }

            this.draggedClientId = null;
            this.draggedFromStatus = null;
            this.dragOverColumn = null;
        }
    }
}
</script>
@endsection

