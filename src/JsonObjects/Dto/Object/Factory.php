<?php

namespace Src\JsonObjects\Dto\Object;

use Src\JsonObjects\Interfaces\Dto\Object\IFactory;

class Factory implements IFactory {

    public function createObjectField(string $type):?AbstractObject
    {
        if($type == AbstractComposite::ARRAY_TYPE){
            $array = new ObjectsArray();
            $array->setFieldsFactory($this);
            return $array;
        }
        if($type == AbstractComposite::STRING_TYPE){
            return new StringObject();
        }
        if($type == AbstractComposite::TEXT_TYPE){
            return new TextObject();
        }
        if($type == ExampleComposit::EXAMPLE_COMPOSIT){
            $object = new ExampleComposit();
            $object->setFieldsFactory($this);
            $object->init();
            return $object;
        }
        if($type == NestedComposite::NESTED_COMPOSIT){
            $object = new NestedComposite();
            $object->setFieldsFactory($this);
            $object->init();
            return $object;
        }
        return null;
    }

}