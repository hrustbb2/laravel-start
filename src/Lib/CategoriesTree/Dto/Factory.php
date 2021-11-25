<?php

namespace Src\Lib\CategoriesTree\Dto;

use Src\Lib\CategoriesTree\Interfaces\Dto\IFactory;
use Src\Lib\CategoriesTree\Interfaces\IFactory as ILibFactory;
use Src\Lib\CategoriesTree\Interfaces\Dto\IPersist;
use Src\Lib\CategoriesTree\Interfaces\Dto\IResource;

class Factory implements IFactory {

    protected ILibFactory $libFactory;

    public function setLibFactory(ILibFactory $factory)
    {
        $this->libFactory = $factory;
    }

    protected function newPersist()
    {
        return new Persist();
    }

    public function createPersist():IPersist
    {
        $persist = $this->newPersist();
        $persist->setDtoFactory($this);
        return $persist;
    }

    protected function newResource()
    {
        return new Resource();
    }

    public function createResource():IResource
    {
        $resource = new Resource();
        $resource->setDtoFactory($this);
        return $resource;
    }

}