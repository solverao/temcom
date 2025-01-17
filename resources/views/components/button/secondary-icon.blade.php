@props(['size' => 'default','icon' => null])

@php
$sizeClasses = match ($size) {
'small' => 'py-2 px-3',
'large' => 'p-4 sm:p-5',
default => 'px-4 py-3',
};
@endphp

<button {{ $attributes->merge(['type' => 'button', 'class' => "$sizeClasses inline-flex items-center gap-x-2 text-sm
    font-medium rounded-lg border border-gray-200 bg-white text-gray-800
    shadow-sm hover:bg-gray-50 focus:outline-none focus:bg-gray-50 disabled:opacity-50 disabled:pointer-events-none
    dark:bg-gray-800 dark:border-gray-700 dark:text-white dark:hover:bg-gray-700 dark:focus:bg-gray-700"])
    }}>
    {{ $slot }}

    @if ($icon)
    @svg($icon,'shrink-0 size-4')
    @endif
</button>