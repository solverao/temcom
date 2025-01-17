@props(['size' => 'default','icon' => null])

@php
$sizeClasses = match ($size) {
'small' => 'py-2 px-3',
'large' => 'p-4 sm:p-5',
default => 'px-4 py-3',
};
@endphp

<button {{ $attributes->merge(['type' => 'submit', 'class' => "$sizeClasses inline-flex items-center gap-x-2 text-sm
    font-medium rounded-lg border border-transparent bg-gray-600
    text-white hover:bg-gray-700 focus:outline-none focus:bg-gray-700 disabled:opacity-50
    disabled:pointer-events-none"]) }}>
    {{ $slot }}

    @if ($icon)
    @svg($icon,'shrink-0 size-4')
    @endif
</button>