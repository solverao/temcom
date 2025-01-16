<?php

namespace Solverao\Temcom\Helpers;

use Illuminate\Support\Facades\Gate;

class SidebarItemHelper
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

    public function checkPermission(array $item): bool
    {
        if (empty($item['can'])) {
            return true;
        }

        // Read the extra arguments (a db model instance can be used).

        $args = ! empty($item['model']) ? $item['model'] : [];

        // Check if the current user can perform the configured permissions.

        if (is_string($item['can']) || is_array($item['can'])) {
            return Gate::any($item['can'], $args);
        }

        return true;
    }

    public function isActive($item)
    {

        // Verifica si la ruta del ítem principal coincide
        if (is_string(data_get($item, 'route'))) {
            return request()->routeIs(
                count(explode('.', data_get($item, 'route'))) > 1 ?
                    explode('.', data_get($item, 'route'))[0] . '.*' :
                    data_get($item, 'route')
            );
        }

        // Verifica si algún ítem del submenú está activo
        if (is_array(data_get($item, 'submenu'))) {
            foreach (data_get($item, 'submenu') as $subItem) {
                if (self::isActive($subItem)) {
                    return true;
                }
            }
        }

        // Por defecto, retorna false si no hay coincidencia
        return false;
    }
}
