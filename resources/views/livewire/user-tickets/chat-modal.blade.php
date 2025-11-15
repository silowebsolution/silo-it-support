<div>
    <form wire:submit.prevent="sendMessage" class="flex flex-col gap-4">
        {{ $this->form }}

        <div class="flex justify-end">
            <x-filament::button type="submit">
                Send Message
            </x-filament::button>
        </div>
    </form>
</div>
