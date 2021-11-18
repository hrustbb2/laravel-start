<?php

namespace Src\Auth\Interfaces\Dto;

use Src\Auth\Interfaces\IFactory as IModuleFactory;

interface IFactory {
    public function setModuleFactory(IModuleFactory $factory);
}