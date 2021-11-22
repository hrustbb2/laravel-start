<?php

namespace Src\FirstModule\Laravel\Providers;

use Illuminate\Foundation\Support\Providers\RouteServiceProvider;
use Illuminate\Support\Facades\Route as RouteFacade;

class Route extends RouteServiceProvider {

    protected $namespace = 'Src\FirstModule\Laravel\Controllers';

    public function map()
    {
        RouteFacade::group(['middleware' => ['web']], function(){
            RouteFacade::prefix('admin/first-module')
                ->as('admin.firstModule.')
                ->namespace($this->namespace)
                ->group(base_path('src/FirstModule/Laravel/routes.php'));
        });
    }

}