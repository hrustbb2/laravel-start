<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Src\ModulesProvider as AdminModulesProvider;

class AppServiceProvider extends ServiceProvider
{
    const ADMIN_MODULES = 'admin-modules';

    const FRONT_FACTORY = 'front-factory';
    
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        $this->loadViewsFrom(__DIR__ . '/../../src/views', 'common');
        $this->app->singleton(self::ADMIN_MODULES, function ($app) {
            return new AdminModulesProvider();
        });
        $this->app->singleton(self::FRONT_FACTORY, function ($app) {
            $modulesProvider = $app->get(self::ADMIN_MODULES);
            $factory = new \App\Models\Factory();
            $factory->injectModules($modulesProvider);
            return $factory;
        });
    }
}
