<?php

use Illuminate\Support\Facades\Artisan;
use App\Providers\AppServiceProvider;
use Src\JsonObjects\Interfaces\IFactory as IModuleFactory;

Artisan::command('json-objects-init', function () {
    /** @var IModuleFactory */
    $factory = app()->get(AppServiceProvider::ADMIN_MODULES)->getJsonObjectsFactory();
    
    $dirsDbTables = $factory->getDirsTreeFactory()->getInfrastructureFactory()->getDbTables();
    $dirsDbTables->init();
    $dirsDbTables->create();
    $dirsDbTables->fillData();
    $dirsData = $dirsDbTables->getCategoriesData();

    $factory->getInfrastructureFactory()->getDbTables()->init($dirsData);
    $factory->getInfrastructureFactory()->getDbTables()->create();
    $factory->getInfrastructureFactory()->getDbTables()->fillData();
});