@props(['align' => 'start'])

<td {{ $attributes->merge([
    'class' => "px-6 py-4 whitespace-nowrap text-$align text-sm text-gray-800 dark:text-neutral-200"
    ]) }}>
    {{ $slot }}
</td>
