<?php

namespace App\Models\JsonObjects;

use Src\Common\Dto\Object\AbstractComposite;

abstract class Base extends AbstractComposite {

    protected string $id;

    public function loadAttributes(array $attrs)
    {
        if(isset($attrs['object'])){
            parent::loadAttributes(json_decode($attrs['object'], true));
            $this->id = $attrs['id'];
        }else{
            parent::loadAttributes($attrs);
        }
    }

    public function getEditFormUrl()
    {
        return route('admin.jsonObjects.item', ['item-id' => $this->id]);
    }

}