@props(['isHover' => false,'isStriped' => false])

<tr @class([ 'hover:bg-gray-100 dark:hover:bg-gray-700'=> $isHover,
    'odd:bg-white even:bg-gray-100 dark:odd:bg-gray-900 dark:even:bg-gray-800' => $isStriped
    ])>
    {{ $slot }}
</tr>