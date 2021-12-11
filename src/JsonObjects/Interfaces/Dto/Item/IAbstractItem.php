<?php

namespace Src\JsonObjects\Interfaces\Dto\Item;

use Src\JsonObjects\Interfaces\Dto\Object\IFactory as IObjectsFactory;

interface IAbstractItem {
    public function setObjectsFactory(IObjectsFactory $factory):void;
    public function getId();
    public function getAttributes():array;
    public function load(array $data):void;
}