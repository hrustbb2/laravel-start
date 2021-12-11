<?php

namespace Src\JsonObjects\Infrastructure;

use Src\JsonObjects\Interfaces\Infrastructure\IFactory;
use Src\JsonObjects\Interfaces\IFactory as IModuleFactory;
use Src\JsonObjects\Interfaces\Infrastructure\IDbTables;
use Src\JsonObjects\Infrastructure\ItemQuery;
use Src\JsonObjects\Interfaces\Infrastructure\IItemStorage;
use Src\JsonObjects\Infrastructure\ItemStorage;
use Src\JsonObjects\Interfaces\Infrastructure\IItemPersistLayer;
use Src\JsonObjects\Infrastructure\ItemPersistLayer;

class Factory implements IFactory {

    protected IModuleFactory $moduleFactory;

    protected ?IDbTables $dbTables = null;

    protected ?IItemStorage $storage = null;

    protected ?IItemPersistLayer $persistLayer = null;

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
        $query = new ItemQuery();
        $tableName = $this->moduleFactory->getSetting(IModuleFactory::OBJECTS_TABLE);
        $query->setTableName($tableName);
        return $query;
    }

    public function getStorage():IItemStorage
    {
        if($this->storage === null){
            $this->storage = new ItemStorage();
            $query = $this->createQuery();
            $this->storage->setObjectsQuery($query);
        }
        return $this->storage;
    }

    public function getPersistLayer():IItemPersistLayer
    {
        if($this->persistLayer === null){
            $this->persistLayer = new ItemPersistLayer();
            $tableName = $this->moduleFactory->getSetting(IModuleFactory::OBJECTS_TABLE);
            $this->persistLayer->setTableName($tableName);
        }
        return $this->persistLayer;
    }

}