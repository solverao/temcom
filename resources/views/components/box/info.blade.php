@props(['title','description','icon' => null,'src' => null])

<div {{ $attributes->merge(['class' => 'flex flex-col bg-white border shadow-sm rounded-xl dark:bg-gray-800
    dark:border-gray-700']) }}>
    <div class="p-4 md:p-5">
        <div class="flex justify-between items-center">
            <div class="flex items-center gap-x-3">
                @if ($src)
                <img class="inline-block size-[38px] rounded-full" src="{{ $src }}" alt="src">
                @elseif ($icon)
                @svg($icon,'inline-block size-[38px] fill-gray-600')
                @endif
                <div class="grow">
                    <p class="text-xs uppercase tracking-wide text-gray-500 dark:text-gray-500 truncate">{{ $title }}</p>
                    <h3 class="text-xl sm:text-2xl font-medium text-gray-800 dark:text-gray-200">
                        {{ $description ?? '' }}
                    </h3>
                </div>
            </div>
            <div class="px-4 sm:px-0">
                {{ $aside ?? '' }}
            </div>
        </div>
    </div>
    <div class="p-4 md:p-5">
        <div class="flex justify-center items-center">
            {{ $slot }}
        </div>
    </div>
</div>