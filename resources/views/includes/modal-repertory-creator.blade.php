
<flux:modal name="repertory-creator" variant="flyout">
    <div class="space-y-6">

        <flux:heading size="lg">Repertory creator</flux:heading>
        <flux:text class="mt-2">Create and add a new repertory.</flux:text>

        <flux:separator class="mt-10 mb-5" />

        <form autocomplete="off" action="{{ route('repertories.store') }}" method="post" enctype="multipart/form-data" id="create-credential">
            @csrf

            <flux:input type="hidden" name="id"/>

            <flux:input type="text" name="name" label="Name" class="mb-5"/>
            <flux:input type="color" name="color" label="Color" class="mb-5"/>


            <flux:separator class="mt-10 mb-5" />

            <flux:button type="submit" class="mt-5" icon="arrow-down-tray">Submit</flux:button>
        </form>


    </div>
</flux:modal>


{{--<script src="{{ asset('/js/app.common.js')}}?v={{ config('custom.assets_version') }}"></script>--}}
