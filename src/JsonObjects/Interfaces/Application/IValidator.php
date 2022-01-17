<?php

namespace Src\JsonObjects\Interfaces\Application;

use Src\Common\Interfaces\Application\IBaseValidator;

interface IValidator extends IBaseValidator {
    public function createObject(array $data):bool;
    public function editObject(array $data):bool;
}