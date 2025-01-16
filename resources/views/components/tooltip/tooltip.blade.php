@props(['icon', 'direction' => 'top'])

@php
$directionClass = match ($direction) {
'right' => 'hs-tooltip [--placement:right] inline-block',
'bottom' => 'hs-tooltip [--placement:bottom] inline-block',
'left' => 'hs-tooltip [--placement:left] inline-block',
default => 'hs-tooltip [--placement:top] inline-block', // Aseguramos un valor predeterminado claro
};
@endphp

<div class="{{ $directionClass }}">
    <!-- Contenido del icono o elemento activador -->
    <button type="button" {{ $attributes->merge([
        'class' => 'hs-tooltip-toggle size-8 inline-flex justify-center items-center gap-x-2 text-sm font-semibold
        rounded-full border border-transparent text-gray-500 hover:bg-gray-100 disabled:opacity-50
        disabled:pointer-events-none dark:text-neutral-400 dark:hover:bg-neutral-700',
        ]) }}>
        @svg($icon, 'shrink-0 size-4')

        <!-- Contenido del tooltip -->
        <span class="hs-tooltip-content opacity-0 invisible transition-opacity absolute z-10 inline-block py-1 px-2 bg-gray-900 text-xs font-medium text-white rounded shadow-sm dark:bg-neutral-700
                        hs-tooltip-shown:opacity-100 hs-tooltip-shown:visible" role="tooltip">
            {{ $slot }}
        </span>
    </button>
</div>
