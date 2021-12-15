<?php

namespace Src\JsonObjects\Interfaces\Infrastructure;

use Src\JsonObjects\Interfaces\Infrastructure\IItemQuery;

interface IItemStorage {
    public function setObjectsQuery(IItemQuery $query);
    public function getById(string $itemId, array $dsl = []):array;
    public function getByDirId(string $dirId, array $dsl = []):array;
}