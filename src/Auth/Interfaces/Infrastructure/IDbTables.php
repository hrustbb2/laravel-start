<?php

namespace Src\Auth\Interfaces\Infrastructure;

use Src\Common\Interfaces\Infrastructure\IInitDb;
use Src\Common\Interfaces\Adapters\IHash;

interface IDbTables extends IInitDb {
    public function setTableName(string $tableName);
    public function setHashAdapter(IHash $hashAdapter);
    public function init();
    public function getData();
    public function create();
    public function drop();
    public function truncate();
    public function fillData();
}