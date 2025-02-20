@props(['active'])

@php
$classes = ($active ?? false)
? 'font-medium text-blue-500 focus:outline-none'
: 'font-medium text-gray-600 hover:text-gray-400 focus:outline-none focus:text-gray-400 dark:text-neutral-400
dark:hover:text-neutral-500 dark:focus:text-neutral-500';
@endphp

<a {{ $attributes->merge(['class' => $classes]) }}>
    {{ $slot }}
</a>