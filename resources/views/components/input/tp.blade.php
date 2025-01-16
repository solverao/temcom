@props(['disabled' => false, 'id'])

<div x-data="togglePassword()">
    <div class="mt-1 relative rounded-md shadow-sm">
        <x-input x-bind:type="type" {{ $attributes }}></x-input>
        <div class="absolute inset-y-0 right-0 pr-3 flex items-center">
            <button type="button" @click="toggle()" class="text-gray-500 focus:outline-none">
                <x-far-eye x-show="!show" class="h-5 w-5" />
                <x-far-eye-slash x-show="show" class="h-5 w-5" />
            </button>
        </div>
    </div>
</div>

<script>
    function togglePassword() {
        return {
            show: false,
            toggle() {
                this.show = !this.show;
            },
            get type() {
                return this.show ? 'text' : 'password';
            }
        };
    }
</script>
