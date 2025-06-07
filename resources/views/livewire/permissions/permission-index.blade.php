<div class="relative mb-6 w-full">
    <flux:heading size="xl" level="1">{{ __('Permissions') }}</flux:heading>
    <flux:subheading size="lg" class="mb-6">{{ __('Manage your all permissions') }}</flux:subheading>
    <flux:separator variant="subtle" />

    <flux:button href="{{ route('permissions.create') }}" class="mt-10 mb-5" icon="plus">
        Add Permission
    </flux:button>

    @session('success')
    <flux:heading>Message : </flux:heading>
    <flux:text class="mt-2" color="green">{{ $value }}</flux:text>
    @endsession

    <div class="mt-5">
        <livewire:permission-table/>
    </div>
</div>
