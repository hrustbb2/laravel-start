<?php

namespace Src\Common\Interfaces\Dto\Object;

use Src\Common\Dto\Object\AbstractObject;

interface IFactory {
    public function createObjectField(string $type):?AbstractObject;
}