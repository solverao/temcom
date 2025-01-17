@props(['svg'])

<x-secondary-button {{ $attributes }}>
    {{ $slot }}

    @if ($svg)
        @svg($svg,'shrink-0 size-4 ml-2')
    @endif
</x-secondary-button>