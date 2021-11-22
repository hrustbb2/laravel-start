<?php

namespace Src\Lib\CategoriesTree\Interfaces\Infrastructure;

interface IPersistLayer {
    public function setTableName(string $tableName);
}