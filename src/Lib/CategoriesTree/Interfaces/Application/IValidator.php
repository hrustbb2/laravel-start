<?php

namespace Src\Lib\CategoriesTree\Interfaces\Application;

use Src\Common\Interfaces\Application\IBaseValidator;

interface IValidator extends IBaseValidator {
    public function createDir(array $data):bool;
}