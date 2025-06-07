<div class="relative mb-6 w-full">
    <flux:heading size="xl" level="1">{{ __('Users') }}</flux:heading>
    <flux:subheading size="lg" class="mb-6">{{ __('Manage your all users') }}</flux:subheading>
    <flux:separator variant="subtle" />

    <flux:button href="{{ route('users.create') }}" class="mt-10 mb-5" icon="plus">
        Add User
    </flux:button>

    @session('success')
    <flux:heading>Message : </flux:heading>
    <flux:text class="mt-2" color="green">{{ $value }}</flux:text>
    @endsession

    <div class="mt-5">
        <livewire:user-table country="fr"/>
    </div>
</div>
