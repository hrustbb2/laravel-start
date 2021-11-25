<?php

namespace Src\JsonObjects\Interfaces\Infrastructure;

use Src\JsonObjects\Interfaces\Infrastructure\IObjectQuery;

interface IObjectsStorage {
    public function setObjectsQuery(IObjectQuery $query);
    public function getByDirId(string $dirId, array $dsl = []):array;
}