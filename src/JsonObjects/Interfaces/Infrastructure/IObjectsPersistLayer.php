<?php

namespace Src\JsonObjects\Interfaces\Infrastructure;

interface IObjectsPersistLayer {
    public function setTableName(string $tableName);
}