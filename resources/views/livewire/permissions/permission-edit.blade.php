<div class="relative mb-6 w-full">
    <flux:heading size="xl" level="1">{{ __('Permissions') }}</flux:heading>
    <flux:subheading size="lg" class="mb-6">{{ __('Edit permission') }}</flux:subheading>
    <flux:separator variant="subtle" />

    <form wire:submit="submit" class="space-y-6">

        <div class="grid auto-rows-min gap-4 md:grid-cols-3">
            <div class="p-8 relative aspect-video overflow-hidden rounded-xl border border-neutral-200 dark:border-neutral-700">

                <flux:input class="mb-5" type="text" label="name" wire:model="name" icon:trailing="user" placeholder="" />
                <flux:input class="mb-5" type="text" label="guard_name" wire:model="guard_name" icon:trailing="user" placeholder="" />
                <flux:button type="submit" class="mt-5" icon="arrow-down-tray">Submit</flux:button>

            </div>
            <div class="relative aspect-video overflow-hidden rounded-xl border border-neutral-200 dark:border-neutral-700">
                <x-placeholder-pattern class="absolute inset-0 size-full stroke-gray-900/20 dark:stroke-neutral-100/20" />
            </div>
            <div class="relative aspect-video overflow-hidden rounded-xl border border-neutral-200 dark:border-neutral-700">
                <x-placeholder-pattern class="absolute inset-0 size-full stroke-gray-900/20 dark:stroke-neutral-100/20" />
            </div>
        </div>

    </form>
</div>
