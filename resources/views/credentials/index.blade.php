<x-layouts.app :title="__('Credentials')">

    <div class="relative mb-6 w-full">
        <flux:heading size="xl" level="1">{{ __('Credentials') }}</flux:heading>
        <flux:subheading size="lg" class="mb-6">{{ __('Manage your all credentials') }}</flux:subheading>
        <flux:separator />


        <flux:modal.trigger name="create-credential">
            <flux:button class="mt-10 mb-5" icon="plus" >Add Credential</flux:button>
        </flux:modal.trigger>


        @include('includes.messages')


        <div class="h-full">
            <livewire:credential-table repertoryId="{{$repertory->id}}"/>
        </div>

        @include('credentials.includes.create-modal')
    </div>

</x-layouts.app>
