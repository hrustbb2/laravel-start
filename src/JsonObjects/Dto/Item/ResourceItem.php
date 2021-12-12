<?php

namespace Src\JsonObjects\Dto\Item;

use Src\JsonObjects\Interfaces\Dto\Item\IResourceItem;

class ResourceItem extends AbstractItem implements IResourceItem {

    public function toArray(array $fields = []):array
    {
        $result = [];
        if(!$fields){
            $fields = ['id', 'key', 'name', 'description', 'object'];
        }
        foreach($fields as $key=>$field){
            if($field == 'id'){
                $result['id'] = $this->id;
            }
            if($field == 'key'){
                $result['key'] = $this->key;
            }
            if($field == 'name'){
                $result['name'] = $this->name;
            }
            if($field == 'description'){
                $result['description'] = $this->description;
            }
            if($field == 'object'){
                $result['object'] = $this->object->getJson();
            }
        }
        return $result;
    }

}