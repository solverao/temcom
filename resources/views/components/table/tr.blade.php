@props(['isHover' => false,'isStriped' => false])

<tr @class([ 'hover:bg-neutral-100 dark:hover:bg-neutral-700'=> $isHover,
    'odd:bg-white even:bg-neutral-100 dark:odd:bg-neutral-900 dark:even:bg-neutral-800' => $isStriped
    ])>
    {{ $slot }}
</tr>