@props(['title','subtitle'])

<div {{ $attributes->merge([
    'class' => 'flex flex-col bg-white border border-gray-200 shadow-sm rounded-xl p-4 md:p-5 dark:bg-neutral-900
    dark:border-neutral-700 dark:text-neutral-400'
    ]) }}>

    @isset($title)
    <h3 class="text-lg font-bold text-gray-800 dark:text-white">
        {{ $title }}
    </h3>
    @endisset

    @isset($subtitle)
    <p class="mt-1 text-xs font-medium uppercase text-gray-500 dark:text-neutral-500">
        {{ $subtitle }}
    </p>
    @endisset

    {{ $slot }}
</div>
