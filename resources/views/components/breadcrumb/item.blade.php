<li class="inline-flex items-center">
    <a {{ $attributes->class('flex items-center text-sm text-gray-500 hover:text-blue-600 focus:outline-none
        focus:text-blue-600 dark:text-gray-500
        dark:hover:text-blue-500 dark:focus:text-blue-500') }}>
        {{ $slot }}
    </a>
    <svg class="shrink-0 size-5 text-gray-400 dark:text-gray-600 mx-2" width="16" height="16" viewBox="0 0 16 16"
        fill="none" xmlns="http://www.w3.org/2000/svg" aria-hidden="true">
        <path d="M6 13L10 3" stroke="currentColor" stroke-linecap="round"></path>
    </svg>
</li>