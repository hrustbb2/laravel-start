<?php

namespace Src\Common\Interfaces\Dto;

use Src\Common\Interfaces\Dto\Object\IFactory as IObjectFactory;

interface IFactory {
    public function getObjectFactory():IObjectFactory;
}