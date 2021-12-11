<?php

namespace Src\JsonObjects\Dto\Item;

use Src\JsonObjects\Interfaces\Dto\Item\IPersistItem;

class PersistItem extends AbstractItem implements IPersistItem {

    public function getInsertAttrs():array
    {
        $this->key = uniqid();
        return [
            'id' => $this->id,
            'dir_id' => '',
            'key' => $this->key,
            'object' => json_encode($this->object->getAttributes()),
        ];
    }

}