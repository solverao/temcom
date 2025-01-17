@props(['icon','sr'])

<button {{ $attributes->merge([
    'type' => 'button',
    'class' => 'inline-flex items-center gap-x-2 px-3 py-2 border border-transparent text-sm rounded-full text-gray-500
    dark:text-gray-400 bg-white dark:bg-gray-800 hover:text-gray-700 dark:hover:text-gray-300 focus:outline-none
    focus:bg-gray-50 dark:focus:bg-gray-700 active:bg-gray-50 dark:active:bg-gray-700'
    ]) }}>


    @svg($icon ?? 'far-circle', 'shrink-0 size-4')

    {{ $slot }}

    <span class="sr-only">{{ $sr }}</span>
</button>