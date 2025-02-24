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
    'inline-flex items-center gap-x-2 text-sm font-medium border border-transparent focus:outline-none disabled:opacity-50 disabled:pointer-events-none',
    'text-blue-600 hover:bg-blue-100 focus:bg-blue-100 hover:text-blue-800 focus:bg-blue-100 focus:text-blue-800 dark:text-blue-500 dark:hover:bg-blue-800/30 dark:hover:text-blue-400 dark:focus:bg-blue-800/30 dark:focus:text-blue-400' => $theme === 'primary',
    'text-gray-500 hover:bg-gray-100 focus:bg-gray-100 dark:text-neutral-400 dark:hover:bg-neutral-800 dark:focus:bg-neutral-800' => $theme === 'secondary',
    'text-red-500 hover:bg-red-100 focus:bg-red-100 hover:text-red-800 dark:hover:bg-red-800/30 dark:hover:text-red-400 dark:focus:bg-red-800/30 dark:focus:text-red-400' => $theme === 'danger',
    'text-yellow-500 hover:bg-yellow-100 focus:bg-yellow-100 hover:text-yellow-800 dark:hover:bg-yellow-800/30 dark:hover:text-yellow-400 dark:focus:bg-yellow-800/30 dark:focus:text-yellow-400' => $theme === 'warning',
    'text-teal-500 hover:bg-teal-100 focus:bg-teal-100 hover:text-teal-800 dark:hover:bg-teal-800/30 dark:hover:text-teal-400 dark:focus:text-teal-400' => $theme === 'info',
    'text-gray-800 hover:bg-gray-100 focus:bg-gray-100 dark:text-white dark:hover:bg-neutral-700 dark:focus:bg-neutral-700' => $theme === 'dark',
    'text-white hover:bg-gray-100 focus:bg-gray-100 hover:text-gray-800 dark:hover:bg-white/10 dark:hover:text-white dark:focus:bg-white/10 dark:focus:text-white' => $theme === 'light',
    ]) }}>
    @isset($icon) @svg($icon,'shrink-0 size-4') @endisset
    @isset($label) {{ $label }} @endisset
</button>