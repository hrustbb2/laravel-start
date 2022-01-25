<?php

namespace Src\JsonObjects\Interfaces\Application;

use Src\Common\Interfaces\Application\IBaseDomain;
use Src\JsonObjects\Interfaces\Application\IValidator;
use Src\JsonObjects\Interfaces\Dto\IFactory as IDtoFactory;
use Src\JsonObjects\Interfaces\Infrastructure\IItemPersistLayer;
use Src\JsonObjects\Interfaces\Infrastructure\IItemStorage;
use Src\JsonObjects\Interfaces\Dto\Item\IResourceItem;
use Src\JsonObjects\Interfaces\Application\IDataBuilder;

interface IDomain extends IBaseDomain {
    public function setValidator(IValidator $validator):void;
    public function setDtoFactory(IDtoFactory $factory):void;
    public function setPersistLayer(IItemPersistLayer $layer):void;
    public function setStorage(IItemStorage $storage):void;
    public function setDataBuilder(IDataBuilder $dataBuilder):void;
    public function createObject(array $data):bool;
    public function editObject(array $data):bool;
    public function renameObject(array $data):bool;
    public function deleteObject(array $data):bool;
    public function getItem():IResourceItem;
}