@props(['align' => 'start'])

@php
$alignClasses = match ($align) {
'start' => 'text-start',
'end' => 'text-end',
default => 'text-start',
};
@endphp

<th scope="col" {{ $attributes->merge([
    'class' => "px-6 py-3 $alignClasses text-xs font-medium text-gray-500 uppercase dark:text-gray-500"
    ]) }}>
    {{ $slot }}
</th>