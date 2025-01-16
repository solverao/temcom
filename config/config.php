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
    'title' => config('app.name'),
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
    | Menu Items
    |--------------------------------------------------------------------------
    |
    | Here we can modify the sidebar/top navigation of the menu.

    |
    */
    'menu' => [
        [
            'text' => 'Dashboard',
            'icon' => 'fas-home',
            'route' => 'dashboard',
        ],
        [
            'text' => 'Admin',
            'icon' => 'fas-shield-halved',
            'can' => ['viewAny users', 'viewAny roles', 'viewAny logs'],
            'submenu' => [
                [
                    'text' => 'Users',
                    'icon' => 'fas-users',
                    'url' => 'users.index',
                    'can' => 'viewAny users',
                ],
                [
                    'text' => 'Roles',
                    'icon' => 'fas-user-lock',
                    'url' => 'roles.index',
                    'can' => 'viewAny roles',
                ],
                [
                    'text' => 'Activity logs',
                    'icon' => 'fas-file-lines',
                    'url' => 'activities.index',
                    'can' => 'viewAny logs',
                ],
            ],
        ],
    ]
];
