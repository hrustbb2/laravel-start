<?php

namespace Src\JsonObjects\Interfaces\Application;

use Src\Common\Interfaces\Application\IBaseDomain;
use Src\JsonObjects\Interfaces\Application\IValidator;
use Src\JsonObjects\Interfaces\Dto\IFactory as IDtoFactory;
use Src\JsonObjects\Interfaces\Infrastructure\IItemPersistLayer;

interface IDomain extends IBaseDomain {
    public function setValidator(IValidator $validator):void;
    public function setDtoFactory(IDtoFactory $factory):void;
    public function setPersistLayer(IItemPersistLayer $layer):void;
    public function createObject(array $data):bool;
}