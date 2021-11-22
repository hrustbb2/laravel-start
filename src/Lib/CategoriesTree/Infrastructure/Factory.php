<?php

namespace Src\Lib\CategoriesTree\Infrastructure;

use Src\Lib\CategoriesTree\Interfaces\Infrastructure\IFactory;
use Src\Lib\CategoriesTree\Interfaces\IFactory as ILibFactory;
use Src\Lib\CategoriesTree\Interfaces\Infrastructure\IStorage;
use Src\Lib\CategoriesTree\Interfaces\Infrastructure\IPersistLayer;

class Factory implements IFactory {

    protected ILibFactory $libFactory;

    protected ?IStorage $storage = null;

    protected ?IPersistLayer $persistLayer = null;

    public function setLibFactory(ILibFactory $factory)
    {
        $this->libFactory = $factory;
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