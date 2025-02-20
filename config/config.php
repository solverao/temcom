<?php

/*
 * You can place your custom package configuration in here.
 */
return [

    /*
    |--------------------------------------------------------------------------
    | Title
    |--------------------------------------------------------------------------
    |
    | Here you can change the default title of your project.
    |
    */
    'title' => 'Temcom',
    'title_prefix' => '',
    'title_postfix' => '',

    /*
    |--------------------------------------------------------------------------
    | Layout
    |--------------------------------------------------------------------------
    |
    | Here we change the design of the application.
    |
    | options: fixed_sidebar,top_navigation
    |
    */
    'layout' => 'fixed_sidebar',

    /*
    |--------------------------------------------------------------------------
    | URLs
    |--------------------------------------------------------------------------
    |
    | Here we can modify the url settings.
    |
    |
    */

    'dashboard_route' => 'dashboard',

    /*
    |--------------------------------------------------------------------------
    | Menu Items
    |--------------------------------------------------------------------------
    |
    | Here we can modify menus.

    |
    */

    'menu' => [
        ['header' => 'account_settings'],
        [
            'text' => 'Dashboard',
            'icon' => 'fas-home',
            'route' => 'dashboard',
        ],
        [
            'text' => 'Profile',
            'icon' => 'far-user-circle',
            'route' => 'profile.show',
            'topnav_user' => true
        ],
    ],

    'filters' => [
        Solverao\Temcom\Menu\Filters\GateFilter::class,
    ],

];
