@props(['disabled' => false])

<input {{ $disabled ? 'disabled' : '' }} {!! $attributes->merge(['class' => 'py-3 px-4 block w-full border-gray-200
rounded-lg text-sm focus:border-blue-500 focus:ring-blue-500 disabled:opacity-50
disabled:pointer-events-none dark:bg-gray-900 dark:border-gray-700 dark:text-gray-400
dark:placeholder-gray-500 dark:focus:ring-gray-600']) !!}>