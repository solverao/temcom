@props(['description'])

<dl class="flex flex-col sm:flex-row gap-1">
    <dt class="min-w-40">
        <span class="block text-sm text-gray-500 dark:text-neutral-500">{{ $description }}</span>
    </dt>
    <dd>
        {{ $slot }}
    </dd>
</dl>