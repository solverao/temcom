@props(['svg' => null,'size' => 'default'])

@php
$size = match ($size) {
'small' => 'py-2 px-3',
'default' => 'py-3 px-4',
'large' => 'p-4 sm:p-5',
default => 'py-3 px-4',
};
@endphp

<button {{ $attributes->merge(['class' => "$size inline-flex items-center gap-x-2 text-sm font-medium rounded-lg border border-transparent text-gray-800 hover:bg-gray-100 focus:outline-none focus:bg-gray-100 disabled:opacity-50 disabled:pointer-events-none dark:text-white dark:hover:bg-gray-700 dark:focus:bg-gray-700"]) }}>

    {{ $slot }}

    @if ($svg)
    @svg($svg,'shrink-0 size-4')
    @endif
</button>