<?php

namespace Src\JsonObjects\Dto\Item;

use Src\JsonObjects\Interfaces\Dto\Item\IResourceItem;
use Src\Lib\CategoriesTree\Interfaces\Dto\IResource as IDirResource;

class ResourceItem extends AbstractItem implements IResourceItem {

    protected IDirResource $dir;

    public function setDir(IDirResource $dir):void
    {
        $this->dir = $dir;
    }

    public function loadDir(array $dirData): void
    {
        $this->dir->load($dirData);
    }
    
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

    public function getDir():IDirResource
    {
        return $this->dir;
    }

}