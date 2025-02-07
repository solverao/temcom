@props(['svg'])

<button type="button" {{ $attributes->merge(['class' => "w-full flex items-center gap-x-3 py-1.5 px-3 rounded-lg text-[13px] text-gray-800 hover:bg-gray-100 disabled:opacity-50 disabled:pointer-events-none focus:outline-none focus:bg-gray-100 dark:text-gray-300 dark:hover:bg-gray-700 dark:focus:bg-gray-700"]) }}>
    @svg($svg,'shrink-0 size-3.5')
    {{ $slot }}
</button>