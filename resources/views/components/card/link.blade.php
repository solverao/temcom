@props(['icon' => 'fas-angle-right','href'])

<a class="mt-3 inline-flex items-center gap-x-1 text-sm font-semibold rounded-lg border border-transparent text-blue-600 decoration-2 hover:text-blue-700 hover:underline focus:underline focus:outline-none focus:text-blue-700 disabled:opacity-50 disabled:pointer-events-none dark:text-blue-500 dark:hover:text-blue-600 dark:focus:text-blue-600"
    href="{{ $href }}">
    {{ $slot }}
    @svg($icon,'hrink-0 size-4')
</a>
