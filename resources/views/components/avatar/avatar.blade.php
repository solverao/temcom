@props(['src','alt'])

<img {{ $attributes->class('size-8 rounded-full object-cover') }} src="{{ $src }}"
    alt="{{ $alt }}" />