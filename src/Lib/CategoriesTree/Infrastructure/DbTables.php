<?php

namespace Src\Lib\CategoriesTree\Infrastructure;

use Src\Common\Infrastructure\InitDb;
use Src\Lib\CategoriesTree\Interfaces\Infrastructure\IDbTables;

class DbTables extends InitDb implements IDbTables {

    protected string $tableName;

    protected array $categoriesData = [];

    public function setTableName(string $tableName)
    {
        $this->tableName = $tableName;
    }

    public function init()
    {
        $uniqId = uniqid();
        $this->categoriesData = [
            [
                'id' => $uniqId,
                'path' => '',
                'parent_id' => '',
                'name' => 'Name_1',
            ],
        ];
    }

    public function getCategoriesData():array
    {
        return $this->categoriesData;
    }

    public function create()
    {
        $table = $this->getTable($this->tableName, ['id' => false, 'primary_key' => ['id']]);
        $table  ->addColumn('id', 'string')
                ->addColumn('path', 'text')
                ->addColumn('parent_id', 'string')
                ->addColumn('name', 'string')
                ->create();
    }

    public function drop()
    {
        $table = $this->getTable($this->tableName);
        $table->drop();
    }

    public function truncate()
    {
        $table = $this->getTable($this->tableName);
        $table->truncate();
    }

    public function fillData()
    {
        $table = $this->getTable($this->tableName);
        $table->insert($this->categoriesData)->save();
    }

}