<?php

namespace Src\JsonObjects\Application;

use Src\Common\Application\BaseDomain;
use Src\JsonObjects\Interfaces\Application\IDomain;
use Src\JsonObjects\Interfaces\Application\IValidator;
use Src\JsonObjects\Interfaces\Dto\IFactory as IDtoFactory;
use Src\JsonObjects\Interfaces\Dto\Item\IResourceItem;
use Src\JsonObjects\Interfaces\Infrastructure\IItemPersistLayer;
use Src\JsonObjects\Interfaces\Infrastructure\IItemStorage;

class Domain extends BaseDomain implements IDomain {

    protected IValidator $validator;

    protected IDtoFactory $dtoFactory;

    protected IItemPersistLayer $persistLayer;

    protected IItemStorage $storage;

    protected IResourceItem $item;

    public function setValidator(IValidator $validator):void
    {
        $this->validator = $validator;
    }

    public function setDtoFactory(IDtoFactory $factory):void
    {
        $this->dtoFactory = $factory;
    }

    public function setPersistLayer(IItemPersistLayer $layer):void
    {
        $this->persistLayer = $layer;
    }

    public function setStorage(IItemStorage $storage):void
    {
        $this->storage = $storage;
    }

    public function createObject(array $data):bool
    {
        if($this->validator->createObject($data)){
            $cleanData = $this->validator->getCleanData();
            $item = $this->dtoFactory->getItemFactory()->createPersist();
            $item->load($cleanData);
            $this->persistLayer->create($item);
            return true;
        }else{
            $this->errors = $this->validator->getErrors();
            $this->responseCode = self::VALIDATION_FAILED_CODE;
            return false;
        }
    }

    public function editObject(array $data):bool
    {
        $this->item = $this->dtoFactory->getItemFactory()->createResource();
        if($this->validator->editObject($data)){
            $cleanData = $this->validator->getCleanData();
            $itemData = $this->storage->getById($cleanData['id']);
            $item = $this->dtoFactory->getItemFactory()->createPersist();
            $item->load($itemData);
            $item->update($cleanData);
            $this->persistLayer->update($item);
            $this->item->load($item->getAttributes());
            return true;
        }else{
            $this->errors = $this->validator->getErrors();
            $this->responseCode = self::VALIDATION_FAILED_CODE;
            return false;
        }
    }

    public function getItem():IResourceItem
    {
        return $this->item;
    }

}