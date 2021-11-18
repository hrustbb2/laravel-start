<?php

namespace Src\Auth\Interfaces\Application;

use Src\Common\Interfaces\Application\IBaseValidator;

interface IValidator extends IBaseValidator {
    public function login(array $data);
}