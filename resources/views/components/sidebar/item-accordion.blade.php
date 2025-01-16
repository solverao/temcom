@props(['name', 'icon', 'active'])

<li x-data="{ open: @js($active) }" x-cloak>
    <button type="button" x-bind:class="!open ? '' : 'bg-neutral-100'"
        class="w-full text-start flex items-center gap-x-3.5 py-2 px-2.5 text-sm text-gray-800 rounded-lg hover:bg-neutral-100 focus:outline-none focus:bg-neutral-100 dark:bg-neutral-800 dark:text-neutral-400 dark:hs-accordion-active:text-white dark:hover:bg-neutral-700 dark:hover:text-neutral-300 dark:focus:bg-neutral-700 dark:focus:text-neutral-300"
        @click="open = !open">

        @if(filled($icon))
            @svg($icon, 'size-4')
        @endif

        {{ $name }}

        <x-css-chevron-up class="ms-auto size-4" x-show="open" />
        <x-css-chevron-down class="ms-auto size-4" x-show="!open" />
    </button>

    <div x-show="open" x-cloak class="w-full overflow-hidden transition-[height] duration-300">
        <ul class="ps-8 pt-1 space-y-1">
            {{ $slot }}
        </ul>
    </div>
</li>