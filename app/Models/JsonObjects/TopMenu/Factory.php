<?php

namespace App\Models\JsonObjects\TopMenu;

use Src\Common\Dto\Object\AbstractObject;
use Src\Common\Interfaces\Dto\Object\IFactory;
use Src\Common\Dto\Object\Factory as BaseFactory;

class Factory extends BaseFactory implements IFactory {

    public function createObjectField(string $type): ?AbstractObject
    {
        if($objField = parent::createObjectField($type)){
            return $objField;
        }
        if($type == TopMenu::TYPE){
            $obj = new TopMenu();
            $obj->setFieldsFactory($this);
            $obj->init();
            return $obj;
        }
        if($type == TopMenuItem::TYPE){
            $obj = new TopMenuItem();
            $obj->setFieldsFactory($this);
            $obj->init();
            return $obj;
        }
        return null;
    }

}