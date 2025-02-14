@props(['active' => false])

@php
$activeClasses = $active ? 'bg-white shadow text-gray-700 dark:bg-gray-800
dark:text-gray-400
dark:bg-gray-800' : 'bg-transparent text-gray-500 dark:text-gray-400';
@endphp

<a type="button" {{$attributes->merge(['href' => '#', 'class' => "$activeClasses py-3 px-4 inline-flex items-center gap-x-2 text-sm hover:text-gray-700
focus:outline-none focus:text-gray-700 font-medium rounded-lg hover:hover:text-gray-600 disabled:opacity-50
disabled:pointer-events-none dark:hover:text-white dark:focus:text-white"]) }}>
    {{ $slot }}
</a>
