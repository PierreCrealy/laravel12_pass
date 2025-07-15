<x-layouts.app :title="__('Credentials Create')">

    <div class="relative mb-6 w-full">
        <flux:heading size="xl" level="1">{{ __('Credentials') }}</flux:heading>
        <flux:subheading size="lg" class="mb-6">{{ __('Manage your all credentials') }}</flux:subheading>
        <flux:separator />


        <form autocomplete="off" action="{{ route('credentials.store') }}" method="post" enctype="multipart/form-data" id="create-credential" class="mt-10">
            @csrf

            <div class="grid auto-rows-min gap-4 md:grid-cols-2">
                <flux:input type="text" name="name" label="Name" placeholder="Your name" class="mb-5"/>
                <flux:select name="repertory_id" label="Repertory" placeholder="Choose repertory..." class="mb-5 w-sm">
                    @foreach(\App\Models\Repertory::all() as $repo)
                        <flux:select.option value="{{$repo->id}}">{{ $repo->name }}</flux:select.option>
                    @endforeach
                </flux:select>
            </div>

            <flux:input type="text" name="value" label="Value" placeholder="Your credential" class="mb-5" />

            <flux:separator class="mt-10 mb-5" />

            <div class="grid auto-rows-min gap-4 md:grid-cols-2">
                <flux:checkbox.group name="tags" label="Liste des tags" class="mb-5">
                    <div class="grid grid-cols-2 gap-4">
                        @foreach(\App\Models\Tag::all() as $tag)
                            <flux:checkbox label="{{ $tag->name }}" value="{{ $tag->id }}" />
                        @endforeach
                    </div>
                </flux:checkbox.group>
            </div>

            <flux:separator class="mt-10 mb-5" />

            <flux:button type="submit" class="mt-5" icon="arrow-down-tray">Submit</flux:button>
        </form>
    </div>

</x-layouts.app>






