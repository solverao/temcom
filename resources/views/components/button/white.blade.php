@props(['svg' => null,'size' => 'default'])

@php
$size = match ($size) {
'small' => 'py-2 px-3',
'default' => 'py-3 px-4',
'large' => 'p-4 sm:p-5',
default => 'py-3 px-4',
};
@endphp

<button {{ $attributes->merge(['type' => 'button','class' => "$size inline-flex items-center gap-x-2 text-sm
    font-medium rounded-lg border border-gray-200 bg-white text-gray-800
    shadow-sm hover:bg-gray-50 focus:outline-none focus:bg-gray-50 disabled:opacity-50 disabled:pointer-events-none
    dark:bg-gray-800 dark:border-gray-700 dark:text-white dark:hover:bg-gray-700 dark:focus:bg-gray-700"])
    }}>
    {{ $slot }}
</button>