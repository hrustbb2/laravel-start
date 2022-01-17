<?php

namespace Src\JsonObjects\Dto\Item;

use Src\JsonObjects\Interfaces\Dto\Item\IPersistItem;

class PersistItem extends AbstractItem implements IPersistItem {

    protected array $updatedAttrs = [];

    protected ?string $dirId;

    public function loadDir(array $dirData):void
    {
        $this->dirId = $dirData['id'];
    }

    public function getInsertAttrs():array
    {
        $this->key = uniqid();
        return [
            'id' => $this->id,
            'dir_id' => $this->dir->getId(),
            'key' => $this->key,
            'name' => $this->name,
            'description' => $this->description,
            'object' => json_encode($this->object->getAttributes()),
        ];
    }

    public function update(array $data):void
    {
        if(key_exists('id', $data) && $this->id != $data['id']){
            $this->id = $data['id'];
            $this->updatedAttrs['id'] = $data['id'];
        }
        if(key_exists('key', $data) && $this->key != $data['key']){
            $this->key = $data['key'];
            $this->updatedAttrs['key'] = $data['key'];
        }
        if(key_exists('name', $data) && $this->name != $data['name']){
            $this->name = $data['name'];
            $this->updatedAttrs['name'] = $data['name'];
        }
        if(key_exists('description', $data) && $this->description != $data['description']){
            $this->description = $data['description'];
            $this->updatedAttrs['description'] = $data['description'];
        }
        if(key_exists('object', $data) && $this->object){
            $this->object->loadAttributes($data['object']);
            $this->updatedAttrs['object'] = json_encode($this->object->getAttributes());
        }
    }

    public function getUpdatedAttrs():array
    {
        return $this->updatedAttrs;
    }

}