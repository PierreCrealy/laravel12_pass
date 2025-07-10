
<flux:modal name="password-generator" variant="flyout">
    <div class="space-y-6">

        <flux:heading size="lg">Generate password</flux:heading>
        <flux:text class="mt-2">Generate a new password for credential.</flux:text>

        <div class="relative">
            <flux:input type="range" value="16" id="length" name="length" label="Length : " min="5" max="50" step="1" class="mb-5"/>
            Number of characters : <span id='length-value'>16</span>
        </div>


        <flux:separator class="mt-10 mb-5" />

        <div class="relative">
            <flux:checkbox.group id="options" label="Options list">
                <div class="grid grid-cols-2 gap-4">

                <flux:checkbox.all label="Toutes"  />

                <flux:checkbox label="Upper" value="maj" />
                <flux:checkbox label="Lower" value="min" />

                <flux:checkbox label="Numbers" value="num" />
                <flux:checkbox label="Symbols" value="sym" />
                <flux:checkbox label="Specials" value="spec" />
                </div>
            </flux:checkbox.group>
        </div>

        <flux:separator class="mt-10 mb-5" />


        <flux:button id="generate" icon="arrow-turn-left-down" class="mt-5" >Generate</flux:button>

        <flux:input id="password" icon="key" value="password..." readonly copyable/>


    </div>
</flux:modal>


{{--<script src="{{ asset('/js/app.common.js')}}?v={{ config('custom.assets_version') }}"></script>--}}
