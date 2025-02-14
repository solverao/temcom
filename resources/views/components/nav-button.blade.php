@props(['active'])

@php
$classes = ($active ?? false)
? 'inline-flex items-center font-semibold text-gray-600 focus:outline-none underline'
: 'inline-flex items-center font-medium text-gray-600 hover:text-gray-400 focus:outline-none focus:text-gray-400
dark:text-gray-400 dark:hover:text-gray-500 dark:focus:text-gray-500 hover:underline';
@endphp

<button {{ $attributes->merge(['class' => $classes]) }}>
    {{ $slot }}
</button>