<div class="flex h-screen bg-white dark:bg-zinc-900">
    <!-- Left Sidebar -->
    <div class="w-64 border-r border-zinc-200 dark:border-zinc-800 bg-zinc-50 dark:bg-zinc-950 flex flex-col">
        <!-- New Chat Button -->
        <div class="p-4 border-b border-zinc-200 dark:border-zinc-800">
            <button 
                wire:click="newChat"
                class="w-full flex items-center gap-3 px-4 py-3 rounded-lg bg-white dark:bg-zinc-900 border border-zinc-200 dark:border-zinc-800 hover:bg-zinc-50 dark:hover:bg-zinc-800 transition-colors text-sm font-medium text-zinc-900 dark:text-zinc-100">
                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4"></path>
                </svg>
                New Request
            </button>
        </div>

        <!-- Chat History -->
        <div class="flex-1 overflow-y-auto">
            <div class="p-2">
                @if(isset($tickets) && $tickets && $tickets->count() > 0)
                    @foreach($tickets as $ticketItem)
                        <button
                            wire:click="selectTicket({{ $ticketItem->id }})"
                            class="w-full text-left px-3 py-2.5 rounded-lg mb-1 transition-colors group
                                {{ $selectedTicketId == $ticketItem->id ? 'bg-zinc-200 dark:bg-zinc-800' : 'hover:bg-zinc-100 dark:hover:bg-zinc-900' }}">
                            <div class="flex items-start gap-3">
                                <div class="flex-1 min-w-0">
                                    <div class="text-sm font-medium text-zinc-900 dark:text-zinc-100 truncate">
                                        {{ $ticketItem->label ?: 'IT Help Request' }}
                                    </div>
                                    @if($ticketItem->messages->count() > 0)
                                        <div class="text-xs text-zinc-500 dark:text-zinc-400 mt-1 truncate">
                                            {{ Str::limit($ticketItem->messages->last()->message, 40) }}
                                        </div>
                                    @endif
                                    <div class="text-xs text-zinc-400 dark:text-zinc-500 mt-1">
                                        {{ $ticketItem->updated_at->diffForHumans() }}
                                    </div>
                                </div>
                            </div>
                        </button>
                    @endforeach
                @else
                    <div class="px-3 py-8 text-center text-sm text-zinc-500 dark:text-zinc-400">
                        No previous requests
                    </div>
                @endif
            </div>
        </div>
    </div>

    <!-- Main Chat Area -->
    <div class="flex-1 flex flex-col">
        <!-- Messages Container -->
        <div class="flex-1 overflow-y-auto" id="messages-container">
            <div class="max-w-3xl mx-auto px-4 py-8">
                @if($messages && $messages->count() > 0)
                    <div class="space-y-6">
                        @foreach($messages as $message)
                            @php
                                $isOwn = $message->user_id == Auth::id();
                                $user = $message->user;
                            @endphp
                            <div class="flex gap-4 {{ $isOwn ? 'justify-end' : 'justify-start' }}">
                                <div class="flex gap-3 max-w-[80%] {{ $isOwn ? 'flex-row-reverse' : 'flex-row' }}">
                                    <!-- Avatar -->
                                    <div class="flex-shrink-0 w-8 h-8 rounded-full flex items-center justify-center text-xs font-medium
                                        {{ $isOwn 
                                            ? 'bg-blue-500 text-white' 
                                            : 'bg-zinc-200 dark:bg-zinc-700 text-zinc-700 dark:text-zinc-200' }}">
                                        @if($user)
                                            {{ $user->initials() }}
                                        @else
                                            ?
                                        @endif
                                    </div>
                                    
                                    <!-- Message Bubble -->
                                    <div class="flex flex-col gap-1">
                                        @if(!$isOwn && $user)
                                            <div class="text-xs font-medium text-zinc-600 dark:text-zinc-400 px-1 mb-0.5">
                                                {{ $user->name }}
                                            </div>
                                        @endif
                                        <div class="rounded-2xl px-4 py-3 
                                            {{ $isOwn 
                                                ? 'bg-blue-500 text-white rounded-br-sm' 
                                                : 'bg-zinc-100 dark:bg-zinc-800 text-zinc-900 dark:text-zinc-100 rounded-bl-sm' }}">
                                            <p class="text-sm whitespace-pre-wrap break-words">{{ $message->message }}</p>
                                        </div>
                                        <div class="text-xs text-zinc-500 dark:text-zinc-400 px-1
                                            {{ $isOwn ? 'text-right' : 'text-left' }}">
                                            {{ $message->created_at->format('g:i A') }}
                                        </div>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    </div>
                @else
                    <!-- Empty State -->
                    <div class="flex flex-col items-center justify-center h-full text-center py-16">
                        <div class="w-16 h-16 rounded-full bg-zinc-100 dark:bg-zinc-800 flex items-center justify-center mb-4">
                            <svg class="w-8 h-8 text-zinc-400 dark:text-zinc-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 10h.01M12 10h.01M16 10h.01M9 16H5a2 2 0 01-2-2V6a2 2 0 012-2h14a2 2 0 012 2v8a2 2 0 01-2 2h-5l-5 5v-5z"></path>
                            </svg>
                        </div>
                        <h3 class="text-lg font-medium text-zinc-900 dark:text-zinc-100 mb-2">Start a new request</h3>
                        <p class="text-sm text-zinc-500 dark:text-zinc-400 max-w-sm">
                            Send a message to get help with your IT request. Our team will respond as soon as possible.
                        </p>
                    </div>
                @endif
            </div>
        </div>

        <!-- Input Area -->
        <div class="border-t border-zinc-200 dark:border-zinc-800 bg-white dark:bg-zinc-900">
            <div class="max-w-3xl mx-auto px-4 py-4">
                <form wire:submit.prevent="sendMessage" class="relative">
                    <div class="flex items-end gap-2">
                        <div class="flex-1 relative">
                            <textarea
                                wire:model="newMessage"
                                rows="1"
                                placeholder="Type your message..."
                                class="w-full px-4 py-3 pr-12 rounded-2xl border border-zinc-300 dark:border-zinc-700 bg-white dark:bg-zinc-800 text-zinc-900 dark:text-zinc-100 placeholder-zinc-400 dark:placeholder-zinc-500 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-transparent resize-none overflow-hidden"
                                style="min-height: 80px; max-height: 300px;"
                                oninput="this.style.height = 'auto'; this.style.height = Math.min(this.scrollHeight, 300) + 'px';"
                                onkeydown="if(event.key === 'Enter' && !event.shiftKey) { event.preventDefault(); this.closest('form').requestSubmit(); }"
                            ></textarea>
                        </div>
                        <button
                            type="submit"
                            class="flex-shrink-0 w-12 h-12 rounded-full bg-blue-500 hover:bg-blue-600 disabled:bg-zinc-300 dark:disabled:bg-zinc-700 disabled:cursor-not-allowed transition-colors flex items-center justify-center text-white"
                            wire:loading.attr="disabled"
                            wire:target="sendMessage">
                            <svg wire:loading.remove wire:target="sendMessage" class="w-5 h-5 transform rotate-90" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 19l9 2-9-18-9 18 9-2zm0 0v-8"></path>
                            </svg>
                            <svg wire:loading wire:target="sendMessage" class="w-5 h-5 animate-spin" fill="none" viewBox="0 0 24 24">
                                <circle class="opacity-25" cx="12" cy="12" r="10" stroke="currentColor" stroke-width="4"></circle>
                                <path class="opacity-75" fill="currentColor" d="M4 12a8 8 0 018-8V0C5.373 0 0 5.373 0 12h4zm2 5.291A7.962 7.962 0 014 12H0c0 3.042 1.135 5.824 3 7.938l3-2.647z"></path>
                            </svg>
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

<script>
    document.addEventListener('livewire:initialized', () => {
        const container = document.getElementById('messages-container');
        if (container) {
            container.scrollTop = container.scrollHeight;
        }

        // Sync URL on initial load if there's a selected ticket but no ticket in URL
        const urlParams = new URLSearchParams(window.location.search);
        const ticketInUrl = urlParams.get('ticket');
        const selectedTicketId = @js($selectedTicketId);
        
        if (selectedTicketId && !ticketInUrl) {
            const url = new URL(window.location);
            url.searchParams.set('ticket', selectedTicketId);
            window.history.replaceState({}, '', url);
        }

        Livewire.on('message-sent', () => {
            setTimeout(() => {
                const container = document.getElementById('messages-container');
                if (container) {
                    container.scrollTop = container.scrollHeight;
                }
            }, 100);
        });

        // Handle URL updates
        Livewire.on('update-url', (event) => {
            // Handle both array and object formats
            const ticketId = Array.isArray(event) ? (event[0]?.ticket ?? event[0]) : (event?.ticket ?? event);
            const url = new URL(window.location);
            
            if (ticketId) {
                url.searchParams.set('ticket', ticketId);
            } else {
                url.searchParams.delete('ticket');
            }
            
            window.history.pushState({}, '', url);
        });
    });
</script>
