<?php

namespace Src\JsonObjects\Interfaces\Pages;

use Src\JsonObjects\Interfaces\IFactory as IModuleFactory;

interface IFactory {
    public function setModuleFactory(IModuleFactory $factory);
    public function createDirPage(string $currentDirId):IDir;
    public function createItemPage(string $itemId):IItem;
}