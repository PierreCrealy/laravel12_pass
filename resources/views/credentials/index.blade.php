<x-layouts.app :title="__('Credentials')">

    @section('bodyClass') credentialsPage @endsection

    <div class="relative mb-6 w-full">
        <flux:heading size="xl" level="1">{{ __('Credentials') }}</flux:heading>
        <flux:subheading size="lg" class="mb-6">{{ __('Manage your all credentials') }}</flux:subheading>
        <flux:separator />


        <flux:button class="mt-10 mb-5" icon="plus" href="{{ route('credentials.create', ['repertory' => $repertory]) }}" >Add Credential</flux:button>

        @include('includes.messages')

        <div class="h-full">
            @foreach($groupedCredentials as $letter => $credentials)
                <h1>{{$letter}}</h1>

                @foreach($credentials as $credential)
                    <flux:modal.trigger name="edit-credential">
                        <flux:button
                            class="open-credential-modal mt-10 mb-5"
                            icon="plus"
                            data-id="{{$credential->id}}"
                            data-name="{{$credential->name}}"
                            data-value="{{$credential->value}}"
                            data-repertory-id="{{$credential->repertory->id}}"
                            data-tags="{{json_encode($credential->tags->pluck('id'))}}"
                        >
                            {{$credential->name}}
                        </flux:button>
                    </flux:modal.trigger>
                @endforeach

                <hr>
            @endforeach
        </div>
{{--        <div class="h-full">--}}
{{--            <livewire:credential-table repertoryId="{{$repertory->id}}"/>--}}
{{--        </div>--}}

        @include('credentials.includes.edit-modal')
    </div>

</x-layouts.app>
