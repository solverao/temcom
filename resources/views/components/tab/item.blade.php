@props(['active' => false])

@php
$activeClasses = $active ? 'bg-white text-gray-700 dark:bg-neutral-800
dark:text-neutral-400
dark:bg-gray-800' : 'bg-transparent text-gray-500 dark:text-neutral-400';
@endphp

<button type="button" {{$attributes->merge(['type' => 'button', 'class' => "$activeClasses py-3 px-4 inline-flex items-center gap-x-2 text-sm hover:text-gray-700
focus:outline-none focus:text-gray-700 font-medium rounded-lg hover:hover:text-gray-600 disabled:opacity-50
disabled:pointer-events-none dark:hover:text-white dark:focus:text-white"]) }}>
    {{ $slot }}
</button>
