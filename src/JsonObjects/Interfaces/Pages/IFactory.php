<?php

namespace Src\JsonObjects\Interfaces\Pages;

use Src\JsonObjects\Interfaces\IFactory as IModuleFactory;

interface IFactory {
    public function setModuleFactory(IModuleFactory $factory);
}