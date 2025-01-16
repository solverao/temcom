@props(['for' => uniqid('checkbox-')])

<label for="{{ $for }}"
    class="flex p-3 w-full bg-white border border-gray-200 rounded-lg text-sm focus:border-blue-500 focus:ring-blue-500 dark:bg-neutral-900 dark:border-neutral-700 dark:text-neutral-400">
    <input type="checkbox" {{ $attributes }}
        class="shrink-0 mt-0.5 border-gray-200 rounded text-blue-600 focus:ring-blue-500 disabled:opacity-50 disabled:pointer-events-none dark:bg-neutral-800 dark:border-neutral-700 dark:checked:bg-blue-500 dark:checked:border-blue-500 dark:focus:ring-offset-gray-800"
        id="{{ $for }}">
    <span class="text-sm text-gray-500 ms-3 dark:text-neutral-400">{{ $slot }}</span>
</label>