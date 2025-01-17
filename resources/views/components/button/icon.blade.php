@props(['svg'])

<x-button {{ $attributes }}>
    {{ $slot }}

    @if ($svg)
        @svg($svg,'shrink-0 size-4 ml-2')
    @endif
</x-button>