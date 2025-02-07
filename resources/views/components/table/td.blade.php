@props(['align' => 'start'])

@php
$alignClasses = match ($align) {
'start' => 'text-start',
'end' => 'text-end',
default => 'text-start',
};
@endphp

<td {{ $attributes->merge([
    'class' => "px-6 py-4 whitespace-nowrap $alignClasses text-sm text-gray-800 dark:text-gray-200"
    ]) }}>
    {{ $slot }}
</td>