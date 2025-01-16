@props(['align' => 'start'])

<th scope="col" {{ $attributes->merge([
    'class' => "px-6 py-3 text-$align text-xs font-medium text-gray-500 uppercase dark:text-neutral-500"
]) }}>
    {{ $slot }}
</th>
