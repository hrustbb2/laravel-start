<?php

namespace Src\JsonObjects\Interfaces\Application;

use Src\JsonObjects\Interfaces\IFactory as IModuleFactory;
use Src\JsonObjects\Interfaces\Application\IDomain;

interface IFactory {
    public function setModuleFactory(IModuleFactory $factorory):void;
    public function getDomain():IDomain;
}