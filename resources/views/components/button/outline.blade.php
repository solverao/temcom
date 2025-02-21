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
    'inline-flex items-center gap-x-2 text-sm font-medium border border-transparent focus:outline-none focus:outline-none disabled:opacity-50 disabled:pointer-events-none',
    'border-blue-500 text-blue-500 hover:border-blue-400 hover:text-blue-400 focus:border-blue-400 focus:text-blue-400' => $theme === 'primary',
    'border-gray-500 text-gray-500 hover:border-gray-400 hover:text-gray-400 focus:border-gray-400 focus:text-gray-400' => $theme === 'secondary',
    'border-red-500 text-red-500 hover:border-red-400 hover:text-red-400 focus:border-red-400 focus:text-red-400' => $theme === 'danger',
    'border-yellow-500 text-yellow-500 hover:border-yellow-400 hover:text-yellow-400 focus:border-yellow-400 focus:text-yellow-400' => $theme === 'warning',
    'border-teal-500 text-teal-500 hover:border-teal-400 hover:text-teal-400 focus:border-teal-400 focus:text-teal-400' => $theme === 'info',
    'border-gray-900 text-gray-900 hover:border-gray-800 hover:text-gray-800 focus:border-gray-800 focus:text-gray-800' => $theme === 'dark',
    ]) }}>
    @isset($icon) @svg($icon,'shrink-0 size-4') @endisset
    @isset($label) {{ $label }} @endisset
</button>