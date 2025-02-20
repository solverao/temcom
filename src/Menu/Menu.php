<?php

namespace Solverao\Temcom\Menu;

class Menu
{
    /**
     * These filters will be used in the menu compilation process.
     *
     * @var array
     */
    protected $filters;

    /**
     * Holds the compiled version of the menu, that results of applying all the
     * filters to the raw menu items.
     *
     * @var array
     */
    protected array $compiledMenu = [];

    /**
     * Holds the raw (uncompiled) version of the menu. The menu is a tree-like
     * structure where a submenu item plays the role of a node with children.
     * All dynamic changes on the menu will be applied over this structure.
     *
     * @var array
     */
    protected array $rawMenu = [];

    /**
     * Constructor.
     *
     * @param  array  $filters
     */
    public function __construct(array $filters = [])
    {
        $this->filters = $filters;
    }

    public function __get($key)
    {
        return $key === 'menu' ? $this->menu() : null;
    }

    public function menu()
    {
        $this->compiledMenu = $this->compileItems($this->rawMenu);

        return $this->compiledMenu;
    }

    protected function compileItems($items)
    {
        // Get the set of compiled items.

        $items = array_filter(
            array_map([$this, 'applyFilters'], $items),
            [Menu::class, 'isAllowed']
        );

        // Return the set of compiled items without array holes, that's why we
        // use the array_values() method.

        return array_values($items);
    }

    public function add(...$items)
    {   
        array_push($this->rawMenu, ...$items);
    }

    protected function applyFilters($item)
    {
        if (! is_array($item)) {
            return $item;
        }

        if (Menu::isSubmenu($item)) {
            $item['submenu'] = $this->compileItems($item['submenu']);
        }

        foreach ($this->filters as $filter) {
            if (! Menu::isAllowed($item)) {
                return $item;
            }

            $item = $filter->transform($item);
        }

        return $item;
    }

    public static function getIcon(array $item): string|null
    {
        return data_get($item, 'icon') ?? null;
    }

    public static function getText(array $item): string
    {
        return __(data_get($item, 'text')) ?? '';
    }

    public static function getRoute(array $item): string
    {
        return data_get($item, 'url') ?? route(data_get($item, 'route')) ?? '';
    }

    /**
     * Checks if a menu item is a header.
     *
     * @param  mixed  $item
     * @return bool
     */
    public static function isHeader($item)
    {
        return is_string($item) || isset($item['header']);
    }

    /**
     * Checks if a menu item is a link.
     *
     * @param  mixed  $item
     * @return bool
     */
    public static function isLink($item)
    {
        return isset($item['text'])
            && (isset($item['url']) || isset($item['route']));
    }

    /**
     * Checks if a menu item is a submenu.
     *
     * @param  mixed  $item
     * @return bool
     */
    public static function isSubmenu($item)
    {
        return isset($item['text'], $item['submenu'])
            && is_array($item['submenu']);
    }

    public static function isAllowed($item)
    {
        // We won't allow empty submenu items on the menu.

        if (self::isSubmenu($item) && ! count($item['submenu'])) {
            return false;
        }

        // In any other case, fallback to the restricted property.

        return $item && empty($item['restricted']);
    }

    public static function isAcceptedItem($item)
    {
        return self::isSubmenu($item)
            || self::isHeader($item)
            || self::isLink($item);
    }

    public static function isValidItem($item)
    {
        return self::isAcceptedItem($item)
            && empty($item['topnav_right'])
            && empty($item['topnav_user'])
            && empty($item['topnav']);
    }

    public static function isValidUserMenuItem($item)
    {
        return self::isAcceptedItem($item) && ! empty($item['topnav_user']);
    }
}
