<?php

namespace Src\JsonObjects\Interfaces\Dto\Item;

interface IResourceItem extends IAbstractItem {
    public function toArray(array $fields = []):array;
}