@props(['icon'])

<a {{ $attributes->merge(['class' => 'py-2 px-3 inline-flex justify-center items-center gap-2 -ms-px first:rounded-s-lg
    first:ms-0 last:rounded-e-lg text-sm
    font-medium focus:z-10 border border-gray-200 bg-white text-gray-800 shadow-sm hover:bg-gray-50 focus:outline-none
    focus:bg-gray-50 disabled:opacity-50 disabled:pointer-events-none dark:bg-neutral-900 dark:border-neutral-700
    dark:text-white dark:hover:bg-neutral-800 dark:focus:bg-neutral-800']) }}>
    {{ $slot }}
    @isset($icon)
    @svg($icon,'shrink-0 size-4')
    @endisset
</a>