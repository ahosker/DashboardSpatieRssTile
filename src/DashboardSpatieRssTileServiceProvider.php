<?php

namespace Phpadam\DashboardSpatieRssTile;

use Illuminate\Support\ServiceProvider;
use Livewire\Livewire;

class DashboardSpatieRssTileServiceProvider extends ServiceProvider
{
    /**
     * Perform post-registration booting of services.
     *
     * @return void
     */
    public function boot()
    {

      if ($this->app->runningInConsole()) {
          $this->commands([
              FetchDataFromApiCommand::class,
          ]);
      }

      $this->publishes([
          __DIR__ . '/../resources/views' => resource_path('views/vendor/DashboardSpatieRssTile'),
      ], 'DashboardSpatieRssTile-views');

      $this->loadViewsFrom(__DIR__ . '/../resources/views', 'DashboardSpatieRssTile');

      Livewire::component('RssTile', SpatieRssTileComponent::class);


        // $this->loadTranslationsFrom(__DIR__.'/../resources/lang', 'phpadam');
        // $this->loadViewsFrom(__DIR__.'/../resources/views', 'phpadam');
        // $this->loadMigrationsFrom(__DIR__.'/../database/migrations');
        // $this->loadRoutesFrom(__DIR__.'/routes.php');

        // Publishing is only necessary when using the CLI.
        //if ($this->app->runningInConsole()) {
            //$this->bootForConsole();
        //}
    }

    /**
     * Register any package services.
     *
     * @return void
     */
    public function register()
    {
        //$this->mergeConfigFrom(__DIR__.'/../config/dashboardspatiersstile.php', 'dashboardspatiersstile');

        // Register the service the package provides.
        //$this->app->singleton('dashboardspatiersstile', function ($app) {
            //return new DashboardSpatieRssTile;
        //});
    }

    /**
     * Get the services provided by the provider.
     *
     * @return array
     */
    public function provides()
    {
        return ['dashboardspatiersstile'];
    }

    /**
     * Console-specific booting.
     *
     * @return void
     */
    protected function bootForConsole()
    {
        // Publishing the configuration file.
        /*
        $this->publishes([
            __DIR__.'/../config/dashboardspatiersstile.php' => config_path('dashboardspatiersstile.php'),
        ], 'dashboardspatiersstile.config');*/

        // Publishing the views.
        /*$this->publishes([
            __DIR__.'/../resources/views' => base_path('resources/views/vendor/phpadam'),
        ], 'dashboardspatiersstile.views');*/

        // Publishing assets.
        /*$this->publishes([
            __DIR__.'/../resources/assets' => public_path('vendor/phpadam'),
        ], 'dashboardspatiersstile.views');*/

        // Publishing the translation files.
        /*$this->publishes([
            __DIR__.'/../resources/lang' => resource_path('lang/vendor/phpadam'),
        ], 'dashboardspatiersstile.views');*/

        // Registering package commands.
        // $this->commands([]);
    }
}
