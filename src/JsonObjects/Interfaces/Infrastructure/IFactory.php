<?php

namespace Src\JsonObjects\Interfaces\Infrastructure;

use Src\JsonObjects\Interfaces\IFactory as IModuleFactory;
use Src\JsonObjects\Interfaces\Infrastructure\IItemStorage;
use Src\JsonObjects\Interfaces\Infrastructure\IItemPersistLayer;

interface IFactory {
    public function setModuleFactory(IModuleFactory $factory);
    public function getDbTables():IDbTables;
    public function getStorage():IItemStorage;
    public function getPersistLayer():IItemPersistLayer;
}