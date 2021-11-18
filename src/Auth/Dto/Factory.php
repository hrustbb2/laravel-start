<?php

namespace Src\Auth\Dto;

use Src\Auth\Interfaces\Dto\IFactory;
use Src\Auth\Interfaces\IFactory as IModuleFactory;

class Factory implements IFactory {

    protected IModuleFactory $moduleFactory = null;

    public function setModuleFactory(IModuleFactory $factory)
    {
        $this->moduleFactory = $factory;
    }

}