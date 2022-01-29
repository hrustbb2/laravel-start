<?php

namespace App\Models;

use App\Models\Interfaces\IFactory;
use App\Models\Interfaces\Pages\IFactory as IPagesFactory;
use App\Models\Pages\Factory as PagesFactory;
use Src\JsonObjects\Interfaces\IModulesProvider;
use Src\JsonObjects\Interfaces\IFactory as IJsonObjectsFactory;

class Factory implements IFactory {

    protected ?IPagesFactory $pagesFactory = null;

    protected IJsonObjectsFactory $jsonObjects;

    public function injectModules(IModulesProvider $provider):void
    {
        $this->jsonObjects = $provider->getJsonObjectsFactory();
    }

    public function getJsonObjects():IJsonObjectsFactory
    {
        return $this->jsonObjects;
    }

    public function getPagesFactory():IPagesFactory
    {
        if($this->pagesFactory === null){
            $this->pagesFactory = new PagesFactory();
            $this->pagesFactory->setModulesFactory($this);
        }
        return $this->pagesFactory;
    }

}