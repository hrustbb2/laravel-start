<?php

namespace Src\Auth\Interfaces\Application;

use Src\Auth\Interfaces\IFactory as IModuleFactory;

interface IFactory {
    public function setModuleFactory(IModuleFactory $factory);
    /**
     * @return IDomain
     */
    public function getDomain();
}