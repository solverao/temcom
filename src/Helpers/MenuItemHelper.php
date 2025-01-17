<?php

namespace Solverao\Temcom\Helpers;

class MenuItemHelper
{
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

    /**
     * Checks if a menu item is allowed to be shown (not restricted).
     *
     * @param  mixed  $item
     * @return bool
     */
    public static function isAllowed($item)
    {
        // We won't allow empty submenu items on the menu.

        if (self::isSubmenu($item) && ! count($item['submenu'])) {
            return false;
        }

        // In any other case, fallback to the restricted property.

        return $item && empty($item['restricted']);
    }

    public function getIcon(array $item): string|null
    {
        return data_get($item, 'icon') ?? null;
    }

    public function getText(array $item): string
    {
        return __(data_get($item, 'text')) ?? '';
    }

    public function getRoute(array $item): string
    {
        return data_get($item, 'url') ?? route(data_get($item, 'route')) ?? '';
    }
}
