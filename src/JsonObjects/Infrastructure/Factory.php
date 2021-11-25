<?php

namespace Src\JsonObjects\Infrastructure;

use Src\JsonObjects\Interfaces\Infrastructure\IFactory;
use Src\JsonObjects\Interfaces\IFactory as IModuleFactory;
use Src\JsonObjects\Interfaces\Infrastructure\IDbTables;
use Src\JsonObjects\Infrastructure\ObjectsQuery;
use Src\JsonObjects\Interfaces\Infrastructure\IObjectsStorage;
use Src\JsonObjects\Infrastructure\ObjectsStorage;

class Factory implements IFactory {

    protected IModuleFactory $moduleFactory;

    protected ?IDbTables $dbTables = null;

    protected ?IObjectsStorage $storage = null;

    public function setModuleFactory(IModuleFactory $factory)
    {
        $this->moduleFactory = $factory;
    }

    public function getDbTables():IDbTables
    {
        if($this->dbTables === null){
            $this->dbTables = new DbTables();
            $dbHost = $this->moduleFactory->getSetting(IModuleFactory::DB_HOST);
            $this->dbTables->setDbHost($dbHost);
            $dbName = $this->moduleFactory->getSetting(IModuleFactory::DB_NAME);
            $this->dbTables->setDbName($dbName);
            $dbUser = $this->moduleFactory->getSetting(IModuleFactory::DB_USER);
            $this->dbTables->setDbUser($dbUser);
            $dbPass = $this->moduleFactory->getSetting(IModuleFactory::DB_PASS);
            $this->dbTables->setDbPassword($dbPass);
            $dbCharset = $this->moduleFactory->getSetting(IModuleFactory::DB_CHARSET);
            $this->dbTables->setDbCharset($dbCharset);
            $tableName = $this->moduleFactory->getSetting(IModuleFactory::OBJECTS_TABLE);
            $this->dbTables->setObjectsTableName($tableName);
        }
        return $this->dbTables;
    }

    protected function createQuery()
    {
        $query = new ObjectsQuery();
        $tableName = $this->moduleFactory->getSetting(IModuleFactory::OBJECTS_TABLE);
        $query->setTableName($tableName);
        return $query;
    }

    public function getStorage():IObjectsStorage
    {
        if($this->storage === null){
            $this->storage = new ObjectsStorage();
            $query = $this->createQuery();
            $this->storage->setObjectsQuery($query);
        }
        return $this->storage;
    }

}