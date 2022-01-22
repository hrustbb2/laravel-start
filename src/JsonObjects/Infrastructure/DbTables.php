<?php

namespace Src\JsonObjects\Infrastructure;

use Src\Common\Infrastructure\InitDb;
use Src\JsonObjects\Interfaces\Infrastructure\IDbTables;

class DbTables extends InitDb implements IDbTables {

    protected string $objectTableName;

    protected array $objectsData = [];

    public function setObjectsTableName(string $tableName)
    {
        $this->objectTableName = $tableName;
    }

    public function init(array $dirsData)
    {
        $this->objectsData = [];
        $factory = new \Src\JsonObjects\Dto\Object\Factory();
        $ex = new \Src\JsonObjects\Dto\Object\ExampleComposit();
        $ex->setFieldsFactory($factory);
        $ex->init();
        $attrs = [
            'name' => ['value' => ''],
            'text' => ['value' => 'Text'],
            'array' => [
                'items' => [
                    [
                        'value' => '',
                        'type' => \Src\JsonObjects\Dto\Object\AbstractObject::STRING_TYPE,
                    ],
                    [
                        'value' => 'Item_2',
                        'type' => \Src\JsonObjects\Dto\Object\AbstractObject::STRING_TYPE,
                    ],
                    [
                        'value' => 'Item_3',
                        'type' => \Src\JsonObjects\Dto\Object\AbstractObject::STRING_TYPE,
                    ],
                ]
            ],
        ];
        $ex->loadAttributes($attrs);
        foreach($dirsData as $dirData){
            $id = uniqid();
            $this->objectsData[] = [
                'id' => $id,
                'dir_id' => $dirData['id'],
                'key' => 'key',
                'name' => 'name',
                'description' => 'description',
                'object' => json_encode($ex->getAttributes()),
            ];
        }
    }

    public function getObjectsData()
    {
        return $this->objectsData;
    }

    public function create()
    {
        $table = $this->getTable($this->objectTableName, ['id' => false, 'primary_key' => ['id']]);
        $table  ->addColumn('id', 'string')
                ->addColumn('dir_id', 'string')
                ->addColumn('key', 'string')
                ->addColumn('name', 'string')
                ->addColumn('description', 'string')
                ->addColumn('object', 'json')
                ->create();
    }

    public function drop()
    {
        $table = $this->getTable($this->objectTableName);
        $table->drop();
    }

    public function truncate()
    {
        $table = $this->getTable($this->objectTableName);
        $table->truncate();
    }

    public function fillData()
    {
        $table = $this->getTable($this->objectTableName);
        $table->insert($this->objectsData)->save();
    }

}