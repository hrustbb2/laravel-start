<?php

namespace Src\Auth\Laravel\Providers;

use Illuminate\Foundation\Support\Providers\RouteServiceProvider;
use Illuminate\Support\Facades\Route as RouteFacade;

class Route extends RouteServiceProvider {

    protected $namespace = 'Src\Auth\Laravel\Controllers';

    public function map()
    {
        RouteFacade::group(['middleware' => ['web']], function(){
            RouteFacade::prefix('admin/auth')
                ->as('admin.auth.')
                ->namespace($this->namespace)
                ->group(base_path('src/Auth/Laravel/routes.php'));
        });
    }

}