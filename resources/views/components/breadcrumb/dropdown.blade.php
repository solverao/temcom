@props(['key' => uniqid('hs-breadcrumb-dropdown'),'text'])

<div class="hs-dropdown [--placement:top-left] relative inline-flex">
    <button id="{{ $key }}" type="button"
        class="hs-dropdown-toggle py-1.5 px-2 inline-flex items-center gap-x-2 text-sm font-medium rounded-lg border border-gray-200 text-gray-800 shadow-sm hover:bg-gray-50 focus:outline-none focus:text-blue-600 disabled:opacity-50 disabled:pointer-events-none dark:border-gray-700 dark:text-white dark:hover:bg-gray-800 dark:focus:text-blue-500"
        aria-haspopup="menu" aria-expanded="false" aria-label="Dropdown">
        @svg('fas-ellipsis-vertical','shrink-0 size-4')
        {{ $text }}
    </button>
    <div class="hs-dropdown-menu hs-dropdown-open:opacity-100 w-48 hidden z-10 transition-[margin,opacity] opacity-0 duration-300 mb-2 bg-white shadow-md rounded-lg p-1 space-y-0.5 dark:bg-gray-800 dark:border dark:border-gray-700 dark:divide-gray-700"
        role="menu" aria-orientation="vertical" aria-labelledby="{{ $key }}">
        {{ $slot }}
    </div>
</div>