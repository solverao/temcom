@inject('sidebarItemHelper', 'Solverao\Temcom\Helpers\SidebarItemHelper')

@if ($sidebarItemHelper->isSubmenu($item) and $sidebarItemHelper->checkPermission($item))
<x-dropdown>
    <x-slot:trigger>
        <x-temcom::nav-button :active="$sidebarItemHelper->isActive($item)">
            {{ $sidebarItemHelper->getText($item) }}
            @svg('fas-angle-down','ms-1 shrink-0 size-4')
        </x-temcom::nav-button>
    </x-slot:trigger>
    <x:slot:content>
        <div class="flex flex-col divide-y divide-neutral-200 p-1 space-y-0.5 dark:divide-neutral-600">
            @each('partials.navigation-menu.nav-link-item', $item['submenu'], 'item')
        </div>
    </x:slot:content>
</x-dropdown>
@elseif($sidebarItemHelper->isLink($item) and $sidebarItemHelper->checkPermission($item))
<x-nav-link href="{{ $sidebarItemHelper->getRoute($item) }}" :active="$sidebarItemHelper->isActive($item)">
    {{ $sidebarItemHelper->getText($item) }}
</x-nav-link>
@endif
