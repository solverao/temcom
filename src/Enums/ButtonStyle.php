<?php

namespace Solverao\Temcom\Enums;

enum ButtonStyle: string
{
    case SOLID = 'solid';
    case OUTLINE = 'outline';
    case GHOST = 'ghost';
    case LINK = 'link';

    public function classes(string $color = 'primary'): string
    {
        $colors = [
            'primary' => 'blue',
            'secondary' => 'gray',
            'success' => 'green',
            'danger' => 'red',
            'warning' => 'yellow',
            'info' => 'cyan',
            'dark' => 'gray-900',
            'light' => 'gray-100',
        ];

        $baseColor = $colors[$color] ?? 'gray';

        return match ($this) {
            self::SOLID => "inline-flex items-center gap-x-2 text-sm font-medium rounded-lg border focus:outline-none border-transparent disabled:opacity-50 disabled:pointer-events-none bg-{$baseColor}-600 hover:bg-{$baseColor}-700 text-white",
            self::OUTLINE => "py-3 px-4 inline-flex items-center gap-x-2 text-sm font-medium rounded-lg border border-gray-200 text-gray-500 hover:border-{$baseColor}-600 hover:text-{$baseColor}-600 focus:outline-none focus:border-{$baseColor}-600 focus:text-{$baseColor}-600 disabled:opacity-50 disabled:pointer-events-none dark:border-neutral-700 dark:text-neutral-400 dark:hover:text-{$baseColor}-500 dark:hover:border-{$baseColor}-600 dark:focus:text-{$baseColor}-500 dark:focus:border-{$baseColor}-600",
            self::GHOST => "text-{$baseColor}-600 hover:bg-{$baseColor}-200 border-transparent",
            self::LINK => "text-{$baseColor}-600 hover:underline border-none bg-transparent",
        };
    }
}
