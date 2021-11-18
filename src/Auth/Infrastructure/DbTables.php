<?php

namespace Src\Auth\Infrastructure;

use Src\Common\Infrastructure\InitDb;
use Src\Auth\Interfaces\Infrastructure\IDbTables;
use Src\Common\Interfaces\Adapters\IHash;

class DbTables extends InitDb implements IDbTables {

    protected string $tableName;

    protected IHash $hashAdapter;

    protected array $initData;

    public function init()
    {
        $this->initData = [
            [
                'id' => uniqid(),
                'email' => 'mail@mail.com',
                'password_hash' => $this->hashAdapter->make('password'),
            ],
        ];
    }

    public function setTableName(string $tableName)
    {
        $this->tableName = $tableName;
    }

    public function setHashAdapter(IHash $hashAdapter)
    {
        $this->hashAdapter = $hashAdapter;
    }

    public function getData()
    {
        return $this->initData;
    }
    
    public function create()
    {
        $table = $this->getTable($this->tableName, ['id' => false, 'primary_key' => ['id']]);

        $table->addColumn('id', 'string')
              ->addColumn('email', 'string')
              ->addColumn('password_hash', 'string')
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
        $table->insert($this->initData)->save();
    }

}