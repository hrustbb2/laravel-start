<?php

namespace Src\JsonObjects\Interfaces\Infrastructure;

use Src\JsonObjects\Interfaces\Dto\Item\IPersistItem;

interface IObjectsPersistLayer {
    public function setTableName(string $tableName);
    public function create(IPersistItem $dto):bool;
}