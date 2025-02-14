@props([
'key' => uniqid('offcanvas_'),
'contentClasses' => 'p-4',
'placement' => 'right'
])

@php
$placementClasses = match ($placement) {
'right' => 'translate-x-full end-0 border-s',
'left' => '-translate-x-full start-0 border-e',
default => 'translate-x-full end-0 border-s',
};
@endphp

<div aria-haspopup="dialog" aria-expanded="false" aria-controls="{{ $key }}" data-hs-overlay="#{{ $key }}">
    {{ $trigger }}
</div>

<div id="{{ $key }}"
    class="hs-overlay hs-overlay-open:translate-x-0 hidden fixed top-0 w-full z-[80] bg-white transition-all duration-300 transform h-full max-w-xs dark:bg-gray-800 dark:border-gray-700 {{ $placementClasses }}"
    role="dialog" tabindex="-1" aria-labelledby="{{ $key }}-label">
    <div class="flex justify-between items-center py-3 px-4 border-b dark:border-gray-700">
        <h3 id="{{ $key }}-label" class="font-bold text-gray-800 dark:text-white">
            {{ $title }}
        </h3>
        <button type="button"
            class="size-8 inline-flex justify-center items-center gap-x-2 rounded-full border border-transparent bg-gray-100 text-gray-800 hover:bg-gray-200 focus:outline-none focus:bg-gray-200 disabled:opacity-50 disabled:pointer-events-none dark:bg-gray-700 dark:hover:bg-gray-600 dark:text-gray-400 dark:focus:bg-gray-600"
            aria-label="Close" data-hs-overlay="#{{ $key }}">
            <span class="sr-only">Close</span>
            <svg class="shrink-0 size-4" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"
                fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                <path d="M18 6 6 18"></path>
                <path d="m6 6 12 12"></path>
            </svg>
        </button>
    </div>
    <div class="{{ $contentClasses }}">
        {{ $content }}
    </div>
</div>