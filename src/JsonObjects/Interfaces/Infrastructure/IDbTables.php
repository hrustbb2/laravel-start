<?php

namespace Src\JsonObjects\Interfaces\Infrastructure;

use Src\Common\Interfaces\Infrastructure\IInitDb;

interface IDbTables extends IInitDb {
    public function setObjectsTableName(string $tableName);
    public function init(array $dirsData);
    public function getObjectsData();
    public function create();
    public function drop();
    public function truncate();
    public function fillData();
}