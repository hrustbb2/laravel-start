<?php

namespace Src\JsonObjects\Laravel\Providers;

use Illuminate\Foundation\Support\Providers\RouteServiceProvider;
use Illuminate\Support\Facades\Route as RouteFacade;

class Route extends RouteServiceProvider {

    protected $namespace = 'Src\JsonObjects\Laravel\Controllers';

    public function map()
    {
        RouteFacade::group(['middleware' => ['web']], function(){
            RouteFacade::prefix('admin/json-objects')
                ->as('admin.jsonObjects.')
                ->namespace($this->namespace)
                ->group(base_path('src/JsonObjects/Laravel/routes.php'));
        });
    }

}