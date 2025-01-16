@props(['icon'])

<button {{ $attributes->merge([
    'type' => 'button',
    'class' => 'size-[38px] relative inline-flex justify-center items-center gap-x-2 text-sm font-semibold rounded-full
    border border-transparent text-gray-800 hover:bg-gray-100 focus:outline-none focus:bg-gray-100
    disabled:opacity-50 disabled:pointer-events-none dark:text-white dark:hover:bg-gray-700
    dark:focus:bg-gray-700'
    ]) }}>

    @svg($icon ?? 'far-circle', 'shrink-0 size-4')

    <span class="sr-only">{{ $slot }}</span>
</button>