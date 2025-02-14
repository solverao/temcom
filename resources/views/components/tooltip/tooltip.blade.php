@props(['text'])

<div x-data="{ show: false }" class="relative flex items-center">
    <div @mouseover="show = true" @mouseleave="show = false" {{ $attributes }}>
        {{ $slot }}
    </div>

    <div x-show="show" x-transition
        class="absolute bottom-full mb-2 w-max px-3 py-1 bg-gray-800 text-white text-sm rounded-md opacity-90"
        style="display: none;">
        {{ $text }}
    </div>
</div>