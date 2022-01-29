<?php

namespace App\Models\Interfaces\Pages;

use Src\Common\Interfaces\Dto\Object\IFactory as IJsonObjectsFactory;
use Src\JsonObjects\Interfaces\Infrastructure\IItemStorage;
use App\Models\JsonObjects\TopMenu\TopMenu;

interface IHome {
    public function setJsonObjectsStorage(IItemStorage $storage):void;
    public function setJsonObjectsFactory(IJsonObjectsFactory $factory):void;
    public function init():void;
    public function getTopMenu():TopMenu;
}