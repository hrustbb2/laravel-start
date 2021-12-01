<?php

namespace Src\Lib\CategoriesTree\Interfaces\Application;

use Src\Lib\CategoriesTree\Interfaces\IFactory as ILibFactory;
use Src\Lib\CategoriesTree\Interfaces\Application\IDomain;

interface IFactory {
    public function setLibFactory(ILibFactory $factory):void;
    public function getDomain():IDomain;
}