<?php

namespace Src\Lib\CategoriesTree\Interfaces\Infrastructure;

use Src\Lib\CategoriesTree\Interfaces\IFactory as ILibFactory;
use Src\Lib\CategoriesTree\Interfaces\Infrastructure\IDbTables;
use Src\Lib\CategoriesTree\Interfaces\Infrastructure\IStorage;
use Src\Lib\CategoriesTree\Interfaces\Infrastructure\IPersistLayer;

interface IFactory {
    public function setLibFactory(ILibFactory $factory);
    public function getDbTables():IDbTables;
    public function getStorage():IStorage;
    public function getPersistLayer():IPersistLayer;
}