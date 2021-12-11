<?php

namespace Src\JsonObjects\Dto;

use Src\JsonObjects\Interfaces\Dto\IFactory;
use Src\JsonObjects\Interfaces\IFactory as IModulesFactory;
use Src\JsonObjects\Interfaces\Dto\Item\IFactory as IItemFactory;
use Src\JsonObjects\Dto\Item\Factory as ItemFactory;

class Factory implements IFactory {

    protected IModulesFactory $modulesFactory;

    protected ?IItemFactory $itemFactory = null;

    public function setModulesFactory(IModulesFactory $factory)
    {
        $this->modulesFactory = $factory;
    }

    public function getModulesFactory():IModulesFactory
    {
        return $this->modulesFactory;
    }

    public function getItemFactory():IItemFactory
    {
        if($this->itemFactory === null){
            $this->itemFactory = new ItemFactory();
            $this->itemFactory->setDtoFactory($this);
        }
        return $this->itemFactory;
    }

}