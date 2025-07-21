<div class="relative mb-6 w-full">
    <flux:heading size="xl" level="1">{{ __('Credentials') }}</flux:heading>
    <flux:subheading size="lg" class="mb-6">{{ __('Manage your all credentials') }}</flux:subheading>
    <flux:separator variant="subtle" />


    @include('includes.messages')

    <div class="mt-5">
        @foreach($groupedCredentials as $letter => $credentials)
            <h1>{{$letter}}</h1>

            @foreach($credentials as $credential)
                <div>
                    <flux:modal.trigger name="create-credential">
                        <flux:button class="mt-10 mb-5" wire:click="$set('credId', {{ $credential->id }})">{{$credential->name}}</flux:button>
                    </flux:modal.trigger>
                </div>

            @endforeach

            <hr>
        @endforeach
    </div>

    @if($credId)
        @include('livewire.credentials.includes.credential-create-modal')
    @endif

</div>
