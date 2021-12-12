<?php

namespace Src\JsonObjects\Dto\Item;

use Src\JsonObjects\Interfaces\IFactory as IModuleFactory;
use Src\JsonObjects\Interfaces\Dto\Item\IFactory;
use Src\JsonObjects\Interfaces\Dto\IFactory as IDtoFactory;
use Src\JsonObjects\Interfaces\Dto\Item\IPersistItem;
use Src\JsonObjects\Interfaces\Dto\Item\IResourceItem;

class Factory implements IFactory {

    protected ?IDtoFactory $dtoFactory = null;

    public function setDtoFactory(IDtoFactory $factory):void
    {
        $this->dtoFactory = $factory;
    }

    public function createPersist():IPersistItem
    {
        $persist = new PersistItem();
        $objFactory = $this->dtoFactory->getModulesFactory()->getSetting(IModuleFactory::OBJECTS_FACTORY);
        $persist->setObjectsFactory($objFactory);
        return $persist;
    }

    public function createResource():IResourceItem
    {
        $resource = new ResourceItem();
        $objFactory = $this->dtoFactory->getModulesFactory()->getSetting(IModuleFactory::OBJECTS_FACTORY);
        $resource->setObjectsFactory($objFactory);
        return $resource;
    }

}