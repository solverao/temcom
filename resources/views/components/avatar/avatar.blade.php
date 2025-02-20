@props(['src','alt','size' => 'size-8'])

<img {{ $attributes->class("inline-block $size rounded-full") }} src="{{ $src }}"
alt="{{ $alt }}" />