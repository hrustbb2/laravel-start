<?php

namespace Src\JsonObjects\Pages;

use Src\JsonObjects\Interfaces\Pages\IFactory;
use Src\JsonObjects\Interfaces\IFactory as IModuleFactory;

class Factory implements IFactory {

    protected IModuleFactory $moduleFactory;

    public function setModuleFactory(IModuleFactory $factory)
    {
        $this->moduleFactory = $factory;
    }

}