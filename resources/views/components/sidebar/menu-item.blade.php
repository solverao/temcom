@props(['item' => [],'temcom'])

@if ($temcom->menuBuilder->isHeader($item))

<x-sidebar.item-header>
    {{ is_string($item) ? $item : $item['header'] }}
</x-sidebar.item-header>

@elseif($temcom->menuBuilder->isSubmenu($item))

<x-sidebar.item-accordion icon="{{ $temcom->menuBuilder->getIcon($item) }}" name="{{ $temcom->menuBuilder->getText($item) }}">
    @foreach ($item['submenu'] as $item)
    <x-sidebar.menu-item :item="$item"></x-sidebar.menu-item>
    @endforeach
</x-sidebar.item-accordion>

@elseif($temcom->menuBuilder->isLink($item))

<x-sidebar.item-link href="{{ $temcom->menuBuilder->getRoute($item) }}" icon="{{ $temcom->menuBuilder->getIcon($item) }}">
    {{ $temcom->menuBuilder->getText($item) }}
</x-sidebar.item-link>

@endif