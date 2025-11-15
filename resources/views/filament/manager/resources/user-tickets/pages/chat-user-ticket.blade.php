<x-filament-panels::page>

    <style>
        .chat-form-wrapper {
            background: white;
            border-top: 1px solid #ddd;
            padding-top: 10px; /* Add back padding for the form wrapper */
            padding-bottom: 10px;
        }

        /* Container spacing */
        .chat-wrapper {
            display: flex;
            flex-direction: column;
            gap: 16px;
            height: calc(100vh - 250px); /* Set explicit height for the wrapper */
        }

        .chat-title {
            font-size: 20px;
            font-weight: bold;
        }

        /* Chat window */
        .chat-container {
            flex-grow: 1; /* Allow chat-container to grow and take available space */
            overflow-y: auto;
            padding: 16px;
            background: white;
            border: 1px solid #ddd;
            border-radius: 8px;
            display: flex;
            flex-direction: column;
            gap: 12px;
        }

        /* Message alignment wrappers */
        .message-row {
            display: flex;
            margin-bottom: 4px;
        }

        .left {
            justify-content: flex-start;
        }

        .right {
            justify-content: flex-end;
        }

        .message-inner {
            display: flex;
            gap: 8px;
            align-items: flex-start;
        }

        .reverse {
            flex-direction: row-reverse;
        }

        /* Avatar */
        .avatar {
            width: 32px;
            height: 32px;
            border-radius: 50%;
        }

        /* Message bubbles */
        .message-left {
            background: #f1f1f1;
            max-width: 75%;
            border-radius: 10px;
            padding: 10px;
        }

        .message-right {
            background: var(--primary-500);
            color: white;
            max-width: 75%;
            border-radius: 10px;
            padding: 10px;
        }

        .msg-name {
            font-size: 14px;
            font-weight: bold;
        }

        .msg-body {
            margin-top: 4px;
            font-size: 14px;
        }

        .msg-time {
            margin-top: 4px;
            font-size: 12px;
            opacity: 0.7;
        }

        /* Form */
        .chat-form {
            display: flex;
            gap: 10px;
            align-items: flex-end;
            padding: 10px; /* Add padding to the form itself */
        }

        .chat-textarea {
            width: 100%;
            border: 1px solid #ccc;
            border-radius: 8px;
            padding: 8px;
            font-size: 14px;
            resize: none;
            outline: none;
        }

        .chat-textarea:focus {
            border-color: var(--primary-500);
            box-shadow: 0 0 0 2px rgba(var(--primary-500-rgb), 0.2);
        }

        .chat-btn {
            background: var(--primary-600);
            color: white;
            padding: 8px 16px;
            border-radius: 8px;
            border: none;
            cursor: pointer;
            font-size: 14px;
        }

        .chat-btn:hover {
            background: var(--primary-700);
        }
    </style>


    <div class="chat-wrapper">

        {{-- Title --}}
        <h2 class="chat-title">
           {{__('Ticket label')}}: {{ $record->label }}
        </h2>

        {{-- Messages --}}
        <div id="chat-box" class="chat-container">
            @php
                $messages = $record->messages()->with('user')->orderBy('id')->get();
            @endphp

            @foreach ($messages as $msg)
                @php
                    $isOwn = $msg->user_id === auth()->id();
                @endphp

                <div class="message-row {{ $isOwn ? 'right' : 'left' }}">
                    <div class="message-inner {{ $isOwn ? 'reverse' : '' }}">

                        {{-- Avatar --}}
                        <img
                            src="{{ $msg->user->profile_photo_url ?? 'https://ui-avatars.com/api/?name=' . $msg->user->name }}"
                            class="avatar"
                        />

                        {{-- Bubble --}}
                        <div class="{{ $isOwn ? 'message-right' : 'message-left' }}">
                            <div class="msg-name">{{ $msg->user->name }}</div>
                            <div class="msg-body">{{ $msg->message }}</div>
                            <div class="msg-time">{{ $msg->created_at->format('Y-m-d H:i') }}</div>
                        </div>

                    </div>
                </div>
            @endforeach
        </div>

        {{-- Send Message --}}
        <div class="chat-form-wrapper">
            <form wire:submit.prevent="sendMessage" class="chat-form">
            <textarea
                wire:model.defer="message"
                rows="2"
                placeholder="Type a message..."
                class="chat-textarea"
            ></textarea>

                <button type="submit" class="chat-btn">
                    Send
                </button>
            </form>
        </div>

    </div>

    {{-- Auto scroll --}}
    <script>
        document.addEventListener('livewire:initialized', () => {
            const chatBox = document.getElementById('chat-box');
            if (chatBox) chatBox.scrollTop = chatBox.scrollHeight;
        });

        Livewire.on('$refresh', () => {
            const chatBox = document.getElementById('chat-box');
            if (chatBox) {
                setTimeout(() => {
                    chatBox.scrollTop = chatBox.scrollHeight;
                }, 50);
            }
        });
    </script>

</x-filament-panels::page>
