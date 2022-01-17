<?php

namespace Src\JsonObjects\Interfaces\Dto\Item;

interface IPersistItem extends IAbstractItem {
    public function getInsertAttrs():array;
    public function update(array $data):void;
    public function getUpdatedAttrs():array;
}