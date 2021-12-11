<?php

namespace Src\JsonObjects\Interfaces\Dto;

use Src\JsonObjects\Interfaces\IFactory as IModulesFactory;
use Src\JsonObjects\Interfaces\Dto\Item\IFactory as IItemFactory;

interface IFactory {
    public function setModulesFactory(IModulesFactory $factory);
    public function getModulesFactory():IModulesFactory;
    public function getItemFactory():IItemFactory;
}