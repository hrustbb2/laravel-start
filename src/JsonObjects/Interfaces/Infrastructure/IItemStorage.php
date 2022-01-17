<?php

namespace Src\JsonObjects\Interfaces\Infrastructure;

use Src\JsonObjects\Interfaces\Infrastructure\IItemQuery;
use Src\Lib\CategoriesTree\Interfaces\Infrastructure\IStorage as IDirStorage;

interface IItemStorage {
    public function setObjectsQuery(IItemQuery $query);
    public function setDirStorage(IDirStorage $storage):void;
    public function getById(string $itemId, array $dsl = []):array;
    public function getByDirId(string $dirId, array $dsl = []):array;
}