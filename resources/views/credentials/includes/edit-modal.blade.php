@props(['credential'])

<flux:modal name="edit-credential" variant="flyout">
    <div class="space-y-6">

        <div class="flex flex-nowrap gap-5">
            <flux:avatar class="flex-1" size="xl" src="{{asset('images/' . $credential->image)}}" />

            <div class="flex-1 w-60" >
                <flux:heading size="xl">Credential</flux:heading>
                <flux:text class="mt-2">See your credential.</flux:text>
            </div>

{{--            <div class="flex items-center">--}}
{{--                <svg class="w-4 h-4 text-yellow-300 me-1" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 22 20">--}}
{{--                    <path d="M20.924 7.625a1.523 1.523 0 0 0-1.238-1.044l-5.051-.734-2.259-4.577a1.534 1.534 0 0 0-2.752 0L7.365 5.847l-5.051.734A1.535 1.535 0 0 0 1.463 9.2l3.656 3.563-.863 5.031a1.532 1.532 0 0 0 2.226 1.616L11 17.033l4.518 2.375a1.534 1.534 0 0 0 2.226-1.617l-.863-5.03L20.537 9.2a1.523 1.523 0 0 0 .387-1.575Z"/>--}}
{{--                </svg>--}}
{{--                <svg class="w-4 h-4 text-gray-300 me-1 dark:text-gray-500" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 22 20">--}}
{{--                    <path d="M20.924 7.625a1.523 1.523 0 0 0-1.238-1.044l-5.051-.734-2.259-4.577a1.534 1.534 0 0 0-2.752 0L7.365 5.847l-5.051.734A1.535 1.535 0 0 0 1.463 9.2l3.656 3.563-.863 5.031a1.532 1.532 0 0 0 2.226 1.616L11 17.033l4.518 2.375a1.534 1.534 0 0 0 2.226-1.617l-.863-5.03L20.537 9.2a1.523 1.523 0 0 0 .387-1.575Z"/>--}}
{{--                </svg>--}}
{{--            </div>--}}


        </div>

        <flux:separator class="mt-10 mb-5" />

        <form autocomplete="off" action="{{ route('credentials.store') }}" method="post" enctype="multipart/form-data" id="create-credential">
            @csrf

            <flux:input type="hidden" name="id"/>

            <flux:input type="text" name="title" label="Titre" class="mb-5"/>
            <flux:input type="text" name="note" label="Note" class="mb-5"/>

            <flux:input type="text" name="login" label="Login" class="mb-5" copyable/>
            <flux:input type="password" name="password" label="Password" class="mb-5" viewable copyable/>


            <flux:callout icon="link" color="amber" class="mb-5" inline="">
                <flux:callout.heading>Link to <flux:link class="credential-link ">website.</flux:link></flux:callout.heading>
            </flux:callout>

            <flux:separator class="mt-10 mb-5" />

            <flux:select name="repertory_id" id="select" label="Repertory" placeholder="Choose repertory..." class="mb-5">
                @foreach(\App\Models\Repertory::all() as $repo)
                    <flux:select.option value="{{$repo->id}}">{{ $repo->name }}</flux:select.option>
                @endforeach
            </flux:select>


            <flux:separator class="mt-10 mb-5" />

            <flux:checkbox.group name="tags" label="Liste des tags" class="tagsCheck mb-5">
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
