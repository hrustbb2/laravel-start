<?php

namespace App\Models\Pages;

use App\Models\Interfaces\Pages\IFactory;
use App\Models\Interfaces\IFactory as IModulesFactory;
use App\Models\Pages\Home;
use App\Models\Interfaces\Pages\IHome;

class Factory implements IFactory {

    protected IModulesFactory $modulesFactory;

    public function setModulesFactory(IModulesFactory $factory):void
    {
        $this->modulesFactory = $factory;
    }

    public function createHome():IHome
    {
        $page = new Home();
        $jObjStorage = $this->modulesFactory->getJsonObjects()->getInfrastructureFactory()->getStorage();
        $page->setJsonObjectsStorage($jObjStorage);
        $jObjFactory = new \App\Models\JsonObjects\Factory();
        $page->setJsonObjectsFactory($jObjFactory);
        $page->init();
        return $page;
    }

}