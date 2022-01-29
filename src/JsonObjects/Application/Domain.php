<?php

namespace Src\JsonObjects\Application;

use Src\Common\Application\BaseDomain;
use Src\JsonObjects\Interfaces\Application\IDomain;
use Src\JsonObjects\Interfaces\Application\IValidator;
use Src\JsonObjects\Interfaces\Dto\IFactory as IDtoFactory;
use Src\JsonObjects\Interfaces\Dto\Item\IResourceItem;
use Src\JsonObjects\Interfaces\Infrastructure\IItemPersistLayer;
use Src\JsonObjects\Interfaces\Infrastructure\IItemStorage;
use Src\JsonObjects\Interfaces\Application\IDataBuilder;

class Domain extends BaseDomain implements IDomain {

    protected IValidator $validator;

    protected IDtoFactory $dtoFactory;

    protected IItemPersistLayer $persistLayer;

    protected IItemStorage $storage;

    protected IResourceItem $item;

    protected IDataBuilder $dataBuilder;

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

    public function setDataBuilder(IDataBuilder $dataBuilder):void
    {
        $this->dataBuilder = $dataBuilder;
    }

    public function createObject(array $data):bool
    {
        $this->item = $this->dtoFactory->getItemFactory()->createResource();
        if($this->validator->createObject($data)){
            $cleanData = $this->validator->getCleanData();
            $fullData = $this->dataBuilder->build($cleanData);
            $item = $this->dtoFactory->getItemFactory()->createPersist();
            $item->load($fullData);
            $this->persistLayer->create($item);
            $this->item->load($item->getAttributes());
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
            //$this->item->getObject()->validate();
            //$this->responseCode = self::VALIDATION_FAILED_CODE;
            return true;
        }else{
            $this->errors = $this->validator->getErrors();
            $this->responseCode = self::VALIDATION_FAILED_CODE;
            return false;
        }
    }

    public function renameObject(array $data):bool
    {
        $this->item = $this->dtoFactory->getItemFactory()->createResource();
        if($this->validator->renameObject($data)){
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

    public function deleteObject(array $data):bool
    {
        if($this->validator->deleteObject($data)){
            $cleanData = $this->validator->getCleanData();
            $itemData = $this->getItem($cleanData['id']);
            if(!$itemData['disabled']){
                $this->persistLayer->delete($cleanData['id']);
                return true;
            }
            return false;
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