<?php

namespace Solverao\Temcom\Helpers;

use Illuminate\Support\Facades\Gate;

class SidebarItemHelper extends MenuItemHelper
{
    // TODO ESTA PARTE SE QUITARA Y SE DEBE DE PASAR AL MENU BUILDER EN LA CLASE TEMCOM
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
