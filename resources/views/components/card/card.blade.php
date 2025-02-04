@props(['title','subtitle'])

<div {{ $attributes->merge([
    'class' => 'flex flex-col bg-white border shadow-sm rounded-xl p-4 md:p-5 dark:bg-gray-800 dark:border-gray-700 dark:shadow-gray-700'
    ]) }}>

    @isset($title)
    <h3 class="text-lg font-bold text-gray-800 dark:text-white">
        {{ $title }}
    </h3>
    @endisset

    @isset($subtitle)
    <p class="mt-1 text-xs font-medium uppercase text-gray-500 dark:text-gray-500">
        {{ $subtitle }}
    </p>
    @endisset

    {{ $slot }}
</div>