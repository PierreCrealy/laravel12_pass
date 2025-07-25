
<flux:modal name="create-credential" variant="flyout">
    <div class="space-y-6">

        <flux:heading size="lg">Create Credential</flux:heading>
        <flux:text class="mt-2">Add a new credential on your repertory.</flux:text>

        <form wire:submit="submit" autocomplete="off" action="{{ route('credentials.create') }}" method="post" enctype="multipart/form-data" id="create-credential">
            @csrf

            <flux:input type="text" name="name" label="Name" wire:model.defer="credential.name" placeholder="Your name" class="mb-5"/>
            <flux:input type="text" name="value" label="Value" wire:model.defer="credential.value" placeholder="Your credential" class="mb-5"/>

            <flux:select name="repertory_id" label="Repertory" wire:model.defer="credential.repertory" placeholder="Choose repertory..." class="mb-5">
                @foreach(\App\Models\Repertory::all() as $repo)
                    <flux:select.option value="{{$repo->id}}">{{ $repo->name }}</flux:select.option>
                @endforeach
            </flux:select>


            <flux:separator class="mt-10 mb-5" />

            <flux:checkbox.group name="tags" label="Liste des tags" wire:model.defer="credential.tags" class="mb-5">
                <div class="grid grid-cols-2 gap-4">
                    @foreach($tags as $tag)
                        <flux:checkbox label="{{ $tag->name }}" value="{{ $tag->id }}" />
                    @endforeach
                </div>
            </flux:checkbox.group>


            <flux:separator class="mt-10 mb-5" />

            <flux:button type="submit" class="mt-5" icon="arrow-down-tray">Submit</flux:button>
        </form>


    </div>
</flux:modal>
