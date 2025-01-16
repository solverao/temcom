@props(['icon'])

<div class="relative">
    <div class="absolute inset-y-0 start-0 flex items-center pointer-events-none z-20 ps-3.5">
        @svg($icon,'shrink-0 size-4 text-gray-400 dark:text-white/60')
    </div>
    <x-input class="py-2 ps-10 pe-16 block w-full" {{ $attributes }}></x-input>
</div>
