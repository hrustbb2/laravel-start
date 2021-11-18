<?php

namespace App\Providers;

use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;
use Illuminate\Support\Facades\Auth;
use Src\Auth\Interfaces\IModulesProvider;

class AuthServiceProvider extends ServiceProvider
{
    /**
     * The policy mappings for the application.
     *
     * @var array
     */
    protected $policies = [
        // 'App\Models\Model' => 'App\Policies\ModelPolicy',
    ];

    /**
     * Register any authentication / authorization services.
     *
     * @return void
     */
    public function boot()
    {
        Auth::provider('user-provider', function ($app) {
            /** @var IModulesProvider */
            $modulesProvider = $app->make(AppServiceProvider::ADMIN_MODULES);
            return $modulesProvider->getAuthModule()->getLaravelFactory()->getUserProvider();
        });
    }
}
