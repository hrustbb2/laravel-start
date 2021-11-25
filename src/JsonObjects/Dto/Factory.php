<?php

namespace Src\JsonObjects\Dto;

use Src\JsonObjects\Interfaces\Dto\IFactory;
use Src\JsonObjects\Interfaces\IFactory as IModulesFactory;

class Factory implements IFactory {

    protected IModulesFactory $modulesFactory;

    public function setModulesFactory(IModulesFactory $factory)
    {
        $this->modulesFactory = $factory;
    }

}