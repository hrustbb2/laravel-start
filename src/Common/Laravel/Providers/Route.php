<?php

namespace Src\Common\Laravel\Providers;

use Illuminate\Foundation\Support\Providers\RouteServiceProvider;
use Illuminate\Support\Facades\Route as RouteFacade;

class Route extends RouteServiceProvider {

    protected $namespace = 'Src\Common\Laravel\Controllers';

    public function map()
    {
        RouteFacade::group(['middleware' => ['web', 'admin.auth']], function(){
            RouteFacade::prefix('admin/common')
                ->as('admin.common.')
                ->namespace($this->namespace)
                ->group(base_path('src/Common/Laravel/routes.php'));
        });
    }

}