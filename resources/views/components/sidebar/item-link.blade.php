@props(['icon', 'active'])

@php
    $classes =
        $active ?? false
            ? 'flex items-center gap-x-3 py-2 px-2.5 bg-gray-100 text-sm text-gray-700 rounded-lg hover:bg-gray-100 dark:bg-neutral-700 dark:text-white'
            : 'flex items-center gap-x-3 py-2 px-2.5 text-sm text-gray-700 rounded-lg hover:bg-gray-100 dark:hover:bg-neutral-700 dark:text-neutral-400 dark:hover:text-neutral-300';
@endphp

<li>
    <a {{ $attributes->merge(['class' => $classes]) }}>
        @if(filled($icon))
        @svg($icon, 'size-4')
        @endif
        {{ $slot }}
    </a>
</li>
