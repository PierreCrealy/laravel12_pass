<div class="relative mb-6 w-full">
    <flux:heading size="xl" level="1">{{ __('Roles') }}</flux:heading>
    <flux:subheading size="lg" class="mb-6">{{ __('Manage your all roles and their permissions') }}</flux:subheading>
    <flux:separator variant="subtle" />

    <flux:button href="{{ route('roles.create') }}" class="mt-10 mb-5" icon="plus">
        Add Role
    </flux:button>

    @session('success')
    <flux:heading>Message : </flux:heading>
    <flux:text class="mt-2" color="green">{{ $value }}</flux:text>
    @endsession

    <div class="mt-5">
        <livewire:role-table/>
    </div>
</div>

