<?php

namespace Src\Lib\CategoriesTree\Interfaces\Application;

use Src\Lib\CategoriesTree\Interfaces\IFactory as ILibFactory;

interface IFactory {
    public function setLibFactory(ILibFactory $factory):void;
}