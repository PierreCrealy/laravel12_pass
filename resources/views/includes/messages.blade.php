

@if(session('success'))
<div>
    <flux:text class="mt-2 bg-lime-500 inline-flex items-center rounded-md px-3 py-2 text-gray-600">
        @if(is_array(Session::get('success')))
            {!! implode('<br>', Session::get('success')) !!}
        @else
            {{ Session::get('success') }}
        @endif
    </flux:text>
</div>
@endif


@if(session('error'))
<div>
    <flux:text class="mt-2 bg-red-500 inline-flex items-center rounded-md px-3 py-2 text-white-600">
        @if(is_array(Session::get('error')))
            {!! implode('<br>', Session::get('error')) !!}
        @else
            {{ Session::get('error') }}
        @endif
    </flux:text>
</div>
@endif
