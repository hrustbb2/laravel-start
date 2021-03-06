<?php

namespace Src\JsonObjects\Interfaces\Dto\Item;

use Src\JsonObjects\Interfaces\Dto\IFactory as IDtoFactory;

interface IFactory {
    public function setDtoFactory(IDtoFactory $factory):void;
    public function createPersist(string $type = ''):IPersistItem;
    public function createResource():IResourceItem;
}