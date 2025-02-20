@props(['src','alt'])

<div class="shrink-0 group block">
    <div class="flex items-center">
        <x-avatar src="{{ $src }}" alt="{{ $alt }}"></x-avatar>
        <div class="ms-3">
            <h3 class="font-semibold text-gray-800 dark:text-white">{{ $name }}</h3>
            <p class="text-sm font-medium text-gray-400 dark:text-neutral-500">{{ $email }}</p>
        </div>
    </div>
</div>