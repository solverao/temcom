<?php

namespace Solverao\Temcom;

use Solverao\Temcom\Menu\Menu;

class Temcom
{
    public $menuBuilder;

    protected $sectionFilterMap;

    public function __construct(array $filters = [])
    {
        $this->sectionFilterMap = [
            'sidebar' => [$this, 'sidebarFilter'],
            'navbar-left' => [$this, 'navbarLeftFilter'],
            'navbar-right' => [$this, 'navbarRightFilter'],
            'navbar-user' => [$this, 'navbarUserMenuFilter'],
        ];

        $this->menuBuilder = new Menu($this->buildFilters($filters));

        $this->buildMenu();
    }

    public function menu(string $sectionToken = null)
    {
        if (isset($this->sectionFilterMap[$sectionToken])) {
            return array_filter(
                $this->menuBuilder->menu,
                $this->sectionFilterMap[$sectionToken]
            );
        }

        // When no section filter token is provided, return the complete menu.

        return $this->menuBuilder->menu;
    }

    protected function buildMenu()
    {
        $menu = config("temcom.menu", []);
        $menu = is_array($menu) ? $menu : [];
        $this->menuBuilder->add(...$menu);
    }

    protected function buildFilters(array $filters): array
    {
        return array_map([app(), 'make'], $filters);
    }

    private function sidebarFilter($item)
    {
        return Menu::isValidItem($item);
    }

    private function navbarUserMenuFilter($item)
    {
        return Menu::isValidUserMenuItem($item);
    }

    private function navbarLeftFilter($item) {}

    private function navbarRightFilter($item) {}
}
