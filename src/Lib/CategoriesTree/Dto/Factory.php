<?php

namespace Src\Lib\CategoriesTree\Dto;

use Src\Lib\CategoriesTree\Interfaces\Dto\IFactory;
use Src\Lib\CategoriesTree\Interfaces\IFactory as ILibFactory;

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

    public function createPersist()
    {
        $persist = $this->newPersist();
        $persist->setDtoFactory($this);
        return $persist;
    }

}