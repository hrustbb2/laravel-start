<?php

namespace App\Models\JsonObjects;

use App\Models\JsonObjects\TopMenu\TopMenu;
use App\Models\JsonObjects\TopMenu\TopMenuItem;
use Src\Common\Dto\Object\AbstractObject;
use Src\Common\Interfaces\Dto\Object\IFactory;
use Src\Common\Dto\Object\Factory as BaseFactory;
use App\Models\JsonObjects\TopMenu\Factory as TopMenuFactory;

class Factory extends BaseFactory implements IFactory {

    protected ?IFactory $topMenuFactory = null;

    public function createObjectField(string $type): ?AbstractObject
    {
        if($objField = parent::createObjectField($type)){
            return $objField;
        }
        if($type == SeoOptions::TYPE){
            $obj = new SeoOptions();
            $obj->setFieldsFactory($this);
            $obj->init();
            return $obj;
        }
        if($type == Info::TYPE){
            $obj = new Info();
            $obj->setFieldsFactory($this);
            $obj->init();
            return $obj;
        }
        if($type == Topic::TYPE){
            $obj = new Topic();
            $obj->setFieldsFactory($this);
            $obj->init();
            return $obj;
        }
        if($type == Header::TYPE){
            $obj = new Header();
            $obj->setFieldsFactory($this);
            $obj->init();
            return $obj;
        }
        if(in_array($type, [TopMenu::TYPE, TopMenuItem::TYPE])){
            return $this->getTopMenuFactory()->createObjectField($type);
        }
        return null;
    }

    protected function getTopMenuFactory()
    {
        if($this->topMenuFactory === null){
            $this->topMenuFactory = new TopMenuFactory();
        }
        return $this->topMenuFactory;
    }

}