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

                <div class="mt-10 mb-20">
                    <div class="flex items-center">
                        <div class="bg-zinc-600 text-white w-12 h-12 rounded-md flex items-center justify-center text-xl font-bold mr-4">
                            {{ $letter }}
                        </div>
                        <div class="flex-1 h-px bg-gray-200"></div>

                        <flux:avatar.group class="**:ring-zinc-100 dark:**:ring-zinc-800">
                            @foreach($credentials as $credential)
                                <flux:avatar circle src="{{asset('images/' . $credential->image)}}" />
                            @endforeach

                            {{--<flux:avatar circle>3+</flux:avatar>--}}
                        </flux:avatar.group>
                    </div>

                    <div class="grid grid-cols-3 gap-4 px-15">
                        @foreach($credentials as $credential)

                            <div class="flex flex-col items-center border border-zinc-700 rounded-lg shadow-sm md:flex-row md:max-w-xl hover:border-zinc-500 transition delay-50 duration-300 ease-in-out hover:scale-95">
                                <img src="{{asset('images/' . $credential->image)}}" alt="{{$credential->image}}" class="object-cover w-full h-full rounded-t-lg md:w-48 md:rounded-none md:rounded-s-lg" >
                                <div class="flex flex-col justify-between p-4 leading-normal">
                                    <h5 class="mb-2 text-2xl font-semibold tracking-tight text-gray-900 dark:text-white">
                                        {{ $credential->title }}
                                    </h5>

                                    <p class="mb-6 font-normal text-gray-500 dark:text-gray-400">
                                        {{ $credential->note }}
                                    </p>

{{--                                    <div class="mb-5">--}}
{{--                                        @foreach($credential->tags as $tag)--}}
{{--                                            <span class="bg-zinc-700 text-white me-2 text-xs px-2 py-1 rounded">{{ $tag->name }}</span>--}}
{{--                                        @endforeach--}}
{{--                                    </div>--}}


                                    <flux:modal.trigger name="edit-credential">
                                        <flux:button
                                            class="open-credential-modal"
                                            icon="bars-3-bottom-right"
                                            data-id="{{$credential->id}}"
                                            data-title="{{$credential->title}}"
                                            data-note="{{$credential->note}}"
                                            data-login="{{$credential->login}}"
                                            data-password="{{$credential->password}}"
                                            data-link="{{$credential->link}}"
                                            data-repertory-id="{{$credential->repertory->id}}"
                                            data-tags="{{json_encode($credential->tags->pluck('id'))}}"
                                        >
                                            View details
                                        </flux:button>
                                    </flux:modal.trigger>
                                </div>
                            </div>

                        @endforeach
                    </div>
                </div>

            @endforeach
        </div>

{{--        <div class="h-full">--}}
{{--            <livewire:credential-table repertoryId="{{$repertory->id}}"/>--}}
{{--        </div>--}}

        @include('credentials.includes.edit-modal')
    </div>

</x-layouts.app>
