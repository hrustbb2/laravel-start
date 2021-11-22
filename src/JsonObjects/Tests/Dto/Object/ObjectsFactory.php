<?php

namespace Src\JsonObjects\Tests\Dto\Object;

use Src\JsonObjects\Dto\Object\AbstractObject;
use Src\JsonObjects\Dto\Object\Factory;

class ObjectsFactory extends Factory {

    public function createObjectField(string $type): AbstractObject
    {
        $obj = parent::createObjectField($type);
        if($obj){
            return $obj;
        }
        $obj = null;
        if($type == ExampleComposit::EXAMPLE_COMPOSIT){
            $obj = new ExampleComposit();
            $obj->setFieldsFactory($this);
            $obj->init();
        }
        if($type == ArrayItemComposite::ARRAY_ITEM_COMPOSIT){
            $obj = new ArrayItemComposite();
            $obj->setFieldsFactory($this);
            $obj->init();
        }
        return $obj;
    }

}