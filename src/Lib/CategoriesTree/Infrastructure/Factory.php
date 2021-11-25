<?php

namespace Src\Lib\CategoriesTree\Infrastructure;

use Src\Lib\CategoriesTree\Interfaces\Infrastructure\IFactory;
use Src\Lib\CategoriesTree\Interfaces\IFactory as ILibFactory;
use Src\Lib\CategoriesTree\Interfaces\Infrastructure\IDbTables;
use Src\Lib\CategoriesTree\Interfaces\Infrastructure\IStorage;
use Src\Lib\CategoriesTree\Interfaces\Infrastructure\IPersistLayer;

class Factory implements IFactory {

    protected ILibFactory $libFactory;

    protected ?IDbTables $dbTable = null;

    protected ?IStorage $storage = null;

    protected ?IPersistLayer $persistLayer = null;

    public function setLibFactory(ILibFactory $factory)
    {
        $this->libFactory = $factory;
    }

    public function getDbTables():IDbTables
    {
        if($this->dbTable === null){
            $this->dbTable = new DbTables();
            $dbHost = $this->libFactory->getSetting(ILibFactory::DB_HOST);
            $this->dbTable->setDbHost($dbHost);
            $dbName = $this->libFactory->getSetting(ILibFactory::DB_NAME);
            $this->dbTable->setDbName($dbName);
            $dbUser = $this->libFactory->getSetting(ILibFactory::DB_USER);
            $this->dbTable->setDbUser($dbUser);
            $dbPass = $this->libFactory->getSetting(ILibFactory::DB_PASS);
            $this->dbTable->setDbPassword($dbPass);
            $dbCharset = $this->libFactory->getSetting(ILibFactory::DB_CHARSET);
            $this->dbTable->setDbCharset($dbCharset);
            $tableName = $this->libFactory->getSetting(ILibFactory::TABLE_NAME);
            $this->dbTable->setTableName($tableName);
        }
        return $this->dbTable;
    } 

    protected function createQuery()
    {
        $query = new Query();
        $tableName = $this->libFactory->getSetting(ILibFactory::TABLE_NAME);
        $query->setTableName($tableName);
        return $query;
    }

    public function getStorage():IStorage
    {
        if($this->storage === null){
            $this->storage = new Storage();
            $query = $this->createQuery();
            $this->storage->setQuery($query);
        }
        return $this->storage;
    }

    public function getPersistLayer():IPersistLayer
    {
        if($this->persistLayer === null){
            $this->persistLayer = new PersistLayer();
            $tableName = $this->libFactory->getSetting(ILibFactory::TABLE_NAME);
            $this->persistLayer->setTableName($tableName);
        }
        return $this->persistLayer;
    }

}