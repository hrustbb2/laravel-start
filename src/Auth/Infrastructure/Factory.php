<?php

namespace Src\Auth\Infrastructure;

use Src\Auth\Interfaces\Infrastructure\IFactory;
use Src\Auth\Interfaces\IFactory as IModuleFactory;
use Src\Auth\Interfaces\Infrastructure\IStorage;
use Src\Auth\Interfaces\Infrastructure\IDbTables;

class Factory implements IFactory {

    protected IModuleFactory $moduleFactory;

    protected ?IStorage $storage = null;

    protected ?IDbTables $dbTables = null;

    public function setModuleFactory(IModuleFactory $factory)
    {
        $this->moduleFactory = $factory;
    }

    protected function createQuery()
    {
        $query = new Query();
        $tableName = $this->moduleFactory->getSetting(IModuleFactory::TABLE_NAME_SETTING);
        $query->setTableName($tableName);
        return $query;
    }

    public function getStorage()
    {
        if($this->storage === null){
            $this->storage = new Storage();
            $query = $this->createQuery();
            $this->storage->setQuery($query);
        }
        return $this->storage;
    }

    public function getDbTables()
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
            $tableName = $this->moduleFactory->getSetting(IModuleFactory::TABLE_NAME_SETTING);
            $this->dbTables->setTableName($tableName);
            $frameworkName = $this->moduleFactory->getSetting(IModuleFactory::FRAMEWORK_NAME);
            $hashAdapter = $this->moduleFactory->getCommonFactory()->getAdaptersFactory($frameworkName)->getHash();
            $this->dbTables->setHashAdapter($hashAdapter);
            $this->dbTables->init();
        }
        return $this->dbTables;
    }

}