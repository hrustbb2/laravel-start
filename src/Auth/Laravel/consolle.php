<?php

use Illuminate\Support\Facades\Artisan;
use App\Providers\AppServiceProvider;
use Src\Auth\Interfaces\IFactory as IModuleFactory;

Artisan::command('auth-init', function () {
    /** @var IModuleFactory */
    $factory = app()->get(AppServiceProvider::ADMIN_MODULES)->getAuthModule();
    $factory->getInfrastructureFactory()->getDbTables()->create();
    $factory->getInfrastructureFactory()->getDbTables()->fillData();
});