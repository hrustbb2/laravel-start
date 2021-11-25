<?php

namespace Src\JsonObjects\Interfaces\Pages;

use Src\JsonObjects\Interfaces\IFactory as IModuleFactory;
use Src\JsonObjects\Interfaces\Pages\IDir;

interface IFactory {
    public function setModuleFactory(IModuleFactory $factory);
    public function createDirPage(string $currentDirId):IDir;
}