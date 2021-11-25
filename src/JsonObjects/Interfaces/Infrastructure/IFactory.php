<?php

namespace Src\JsonObjects\Interfaces\Infrastructure;

use Src\JsonObjects\Interfaces\IFactory as IModuleFactory;
use Src\JsonObjects\Interfaces\Infrastructure\IObjectsStorage;

interface IFactory {
    public function setModuleFactory(IModuleFactory $factory);
    public function getDbTables():IDbTables;
    public function getStorage():IObjectsStorage;
}