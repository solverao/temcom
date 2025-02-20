@props(['name', 'icon', 'active' => false])

<li x-data="{ open: @js($active) }" x-cloak>
    <button type="button" x-bind:class="!open ? '' : 'bg-gray-100'"
        class="w-full text-start flex items-center gap-x-3.5 py-2 px-2.5 text-sm text-gray-800 rounded-lg hover:bg-gray-100 focus:outline-none focus:bg-gray-100 dark:bg-gray-800 dark:text-gray-400 dark:hs-accordion-active:text-white dark:hover:bg-gray-700 dark:hover:text-gray-300 dark:focus:bg-gray-700 dark:focus:text-gray-300"
        @click="open = !open">

        @isset($icon)
        @svg($icon, 'shirnk-0 size-4')
        @endisset

        {{ $name }}

        <x-fas-angle-up class="ms-auto size-4" x-show="open" />
        <x-fas-angle-down class="ms-auto size-4" x-show="!open" />
    </button>

    <div x-show="open" x-cloak class="w-full overflow-hidden transition-[height] duration-300">
        <ul class="ps-8 pt-1 space-y-1">
            {{ $slot }}
        </ul>
    </div>
</li>