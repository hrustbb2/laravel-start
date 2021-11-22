<?php

namespace Src\JsonObjects\Interfaces\Dto\Object;

use Src\JsonObjects\Dto\Object\AbstractObject;

interface IFactory {
    public function createObjectField(string $type):?AbstractObject;
}