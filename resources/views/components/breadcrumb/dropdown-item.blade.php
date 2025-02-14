<a {{ $attributes->merge(['class' => 'flex items-center gap-x-3.5 py-2 px-3 rounded-lg text-sm text-gray-800
    hover:bg-gray-100 focus:outline-none
    focus:bg-gray-100 disabled:opacity-50 disabled:pointer-events-none dark:text-gray-400 dark:hover:bg-gray-700
    dark:hover:text-gray-300 dark:focus:bg-gray-700']) }}>
    {{ $slot }}
</a>