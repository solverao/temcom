<?php

namespace Solverao\Temcom;

use Livewire\Livewire;
use Illuminate\Support\Facades\View;
use Illuminate\Support\ServiceProvider;
use Solverao\Temcom\Console\ConfigurePreline;
use Solverao\Temcom\Console\InstallTemcomPackage;
use Solverao\Temcom\Http\Livewire\TopNavigationMenu;

class TemcomServiceProvider extends ServiceProvider
{
    protected $pkgPrefix = 'temcom';

    /**
     * Bootstrap the application services.
     */
    public function boot()
    {
        // $this->loadTranslations();
        $this->loadViews();
        // $this->loadMigrations();
        // $this->loadRoutes();

        if ($this->app->runningInConsole()) {
            $this->publishesConfig();
            $this->publishesViews();
            $this->registerCommands();
            $this->publishesLayouts();
            $this->publishesAssets();

            // $this->publishesTransaltions();
        }

        $this->registerViewComposers();

        $this->registerLivewireComponents();
    }

    /**
     * Register the application services.
     */
    public function register()
    {
        // Automatically apply the package configuration
        $this->mergeConfigFrom(__DIR__ . '/../config/config.php', 'temcom');

        // Register the main class to use with the facade
        $this->app->singleton('temcom', function () {
            return new Temcom;
        });
    }

    private function loadViews()
    {
        $this->loadViewsFrom(__DIR__ . '/../resources/views', $this->pkgPrefix);
    }

    private function loadTranslations()
    {
        $this->loadTranslationsFrom(__DIR__ . '/../resources/lang', $this->pkgPrefix);
    }

    private function loadMigrations()
    {
        $this->loadMigrationsFrom(__DIR__ . '/../database/migrations');
    }

    private function loadRoutes()
    {
        $this->loadRoutesFrom(__DIR__ . '/routes.php');
    }

    private function registerCommands()
    {
        $this->commands([
            InstallTemcomPackage::class,
            ConfigurePreline::class
        ]);
    }

    private function publishesConfig()
    {
        $this->publishes([
            __DIR__ . '/../config/config.php' => config_path('temcom.php'),
        ], 'temcom:config');
    }

    private function publishesViews()
    {
        $this->publishes([
            __DIR__ . '/../resources/views' => resource_path('views/vendor/temcom'),
        ], 'temcom:views');
    }

    private function publishesTransaltions()
    {
        $this->publishes([
            __DIR__ . '/../resources/lang' => resource_path('lang/vendor/temcom'),
        ], 'temcom:lang');
    }

    private function publishesAssets()
    {
            $this->publishes([
                __DIR__ . '/../resources/js' => public_path('vendor/temcom/js'),
            ], 'temcom:assets');
    }


    private function publishesLayouts()
    {
        $this->publishes([
            __DIR__ . '/../resources/views/layouts/app.blade.php' => resource_path('views/layouts/app.blade.php'),
        ], 'temcom:layout-app');

        $this->publishes([
            __DIR__ . '/../resources/views/layouts/guest.blade.php' => resource_path('views/layouts/guest.blade.php'),
        ], 'temcom:layout-guest');
    }

    private function registerViewComposers()
    {
        View::composer('temcom::page', function (\Illuminate\View\View $v) {
            $v->with('temcom', $this->app->make(Temcom::class));
        });
    }

    Private function registerLivewireComponents(){
        //
    }

}
