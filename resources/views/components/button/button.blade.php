@php
$roundedClass = 'rounded-'.$rounded;

$sizeClasses = match ($size) {
'small' => 'py-2 px-3',
'default' => 'py-3 px-4',
'large' => 'p-4 sm:p-5',
default => 'py-3 px-4',
};
@endphp

<button type="{{ $type }}" {{ $attributes->merge(['class' => "$roundedClass $sizeClasses $classes"]) }}>
    @isset($icon) @svg($icon,'shrink-0 size-4') @endisset
    @isset($label) {{ $label }} @endisset
</button>