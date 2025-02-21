@php
$sizeClasses = match ($size) {
'small' => 'py-2 px-3',
'default' => 'py-3 px-4',
'large' => 'p-4 sm:p-5',
default => 'py-3 px-4',
};
@endphp

<button type="{{ $type }}" {{ $attributes->class([
    $sizeClasses,
    'rounded-'.$rounded,
    'inline-flex items-center gap-x-2 text-sm font-medium border border-transparent focus:outline-none disabled:pointer-events-none',
    'bg-blue-600 hover:bg-blue-700 text-white' => $theme === 'primary',
    'bg-gray-600 hover:bg-gray-700 text-white' => $theme === 'secondary',
    'bg-red-600 hover:bg-red-700 text-white' => $theme === 'danger',
    'bg-yellow-600 hover:bg-yellow-700 text-white' => $theme === 'warning',
    'bg-cyan-600 hover:bg-cyan-700 text-white' => $theme === 'info',
    'bg-gray-900 hover:bg-gray-800 text-white' => $theme === 'dark',
    'bg-gray-100 hover:bg-gray-200 text-gray-600' => $theme === 'light',
    ]) }}>
    @isset($icon) @svg($icon,'shrink-0 size-4') @endisset
    @isset($label) {{ $label }} @endisset
</button>