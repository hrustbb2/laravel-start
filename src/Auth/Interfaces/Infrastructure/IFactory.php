<?php

namespace Src\Auth\Interfaces\Infrastructure;

use Src\Auth\Interfaces\IFactory as IModuleFactory;
use Src\Auth\Interfaces\Infrastructure\IStorage;
use Src\Auth\Interfaces\Infrastructure\IDbTables;

interface IFactory {
    public function setModuleFactory(IModuleFactory $factory);
    /**
     * @return IStorage
     */
    public function getStorage();

    /**
     * @return IDbTables
     */
    public function getDbTables();
}