@props([
'title',
'subtitle',
'body',
'icon',
'iconClasses' => 'shrink-0 size-4 fill-gray-500'
])

<div x-data="{ showIcons: false }" @mouseover="showIcons = true" @mouseleave="showIcons = false" {{ $attributes->merge([
    'class' => 'relative flex flex-col bg-white shadow rounded-xl dark:bg-gray-900
    dark:shadow-gray-700/70'
    ]) }}>

    @isset($options)
    <div x-show="showIcons" x-transition class="absolute top-2 right-2 inline-flex rounded-lg shadow overflow-x-auto">
        {{ $options }}
    </div>
    @endisset

    @isset($featured)
    <div class="bg-gray-100 border-b rounded-t-xl py-3 px-4 md:py-4 md:px-5 dark:bg-gray-900 dark:border-gray-700">
        {{ $featured }}
    </div>
    @endisset

    {{ $object ?? '' }}

    <div class="p-4 md:p-5">
        <div class="inline-flex space-x-2 items-center w-full truncate">

            @isset($icon)
            @svg($icon,$iconClasses)
            @endisset

            @isset($title)
            <p class="text-base font-bold text-gray-800 dark:text-white overflow-hidden text-ellipsis">
                {{ $title }}
            </p>
            @endisset
        </div>

        @isset($subtitle)
        <p class="mt-1 text-xs font-medium uppercase text-gray-500 dark:text-gray-500">
            {{ $subtitle }}
        </p>
        @endisset

        @isset($body)
        <p {{ $body->attributes->class(['mt-2 text-gray-500 dark:text-gray-400']) }}>
            {{ $body }}
        </p>
        @endisset

        {{ $slot }}
    </div>

    {{ $objectBottom ?? '' }}

    @isset($footer)
    <div class="bg-gray-100 border-t rounded-b-xl py-3 px-4 md:py-4 md:px-5 dark:bg-gray-900 dark:border-gray-700">
        {{ $footer }}
    </div>
    @endisset

</div>