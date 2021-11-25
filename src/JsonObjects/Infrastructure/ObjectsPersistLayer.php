<?php

namespace Src\JsonObjects\Infrastructure;

use Src\JsonObjects\Interfaces\Infrastructure\IObjectsPersistLayer;

class ObjectsPersistLayer implements IObjectsPersistLayer {

    protected string $tableName;

    public function setTableName(string $tableName)
    {
        $this->tableName = $tableName;
    }

}