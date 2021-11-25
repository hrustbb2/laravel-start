<?php

namespace Src\JsonObjects\Interfaces\Dto;

use Src\JsonObjects\Interfaces\IFactory as IModulesFactory;

interface IFactory {
    public function setModulesFactory(IModulesFactory $factory);
}