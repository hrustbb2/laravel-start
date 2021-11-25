<?php

namespace Src\Lib\CategoriesTree\Interfaces\Infrastructure;

use Src\Common\Interfaces\Infrastructure\IInitDb;

interface IDbTables extends IInitDb {
    public function setTableName(string $tableName);
    public function init();
    public function getCategoriesData():array;
    public function create();
    public function drop();
    public function truncate();
    public function fillData();
}