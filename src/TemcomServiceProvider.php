<?php

namespace Solverao\Temcom;

use Illuminate\Support\Facades\Blade;
use Illuminate\Support\Facades\View;
use Illuminate\Support\ServiceProvider;
use Solverao\Temcom\View\Components\Button;
use Solverao\Temcom\Console\ConfigurePreline;
use Solverao\Temcom\Console\InstallTemcomPackage;

class TemcomServiceProvider extends ServiceProvider
{
    protected $pkgPrefix = 'temcom';

    /**
     * Bootstrap the application services.
     */
    public function boot()
    {
        $this->loadViews();
        $this->registerViewShare();

        $this->publishesConfig();
        // $this->registerCommands();

        Blade::components([
            'button' => Button::class
        ], 'temcom');
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
            return new Temcom(config('temcom.filters', []));
        });
    }

    private function loadViews()
    {
        $this->loadViewsFrom(__DIR__ . '/../resources/views', 'temcom');
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

    private function registerViewShare()
    {
        View::share('temcom', new Temcom(config('temcom.filters', [])));
    }
}
