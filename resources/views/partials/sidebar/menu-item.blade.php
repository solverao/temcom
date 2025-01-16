@inject('sidebarItemHelper', 'Solverao\Temcom\Helpers\SidebarItemHelper')


@if($sidebarItemHelper->isSubmenu($item))

<x-temcom::sidebar.item-accordion icon="{{ $sidebarItemHelper->getIcon($item) }}"
    name="{{ $sidebarItemHelper->getText($item) }}" :active="$sidebarItemHelper->isActive($item)">
    @each('temcom::partials.sidebar.menu-item', $item['submenu'], 'item')
</x-temcom::sidebar.item-accordion>

@elseif($sidebarItemHelper->isLink($item))

<x-temcom::sidebar.item-link href="{{ $sidebarItemHelper->getRoute($item) }}"
    icon="{{ $sidebarItemHelper->getIcon($item) }}" :active="$sidebarItemHelper->isActive($item)">
    {{ $sidebarItemHelper->getText($item) }}
</x-temcom::sidebar.item-link>

@endif