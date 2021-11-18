<?php

namespace Src\Auth\Interfaces\Pages;

use Src\Auth\Interfaces\IFactory as IModuleFactory;
use Src\Auth\Interfaces\Pages\ILoginForm;

interface IFactory {
    public function setModuleFactory(IModuleFactory $factory);
    /**
     * @return ILoginForm
     */
    public function createLoginForm();
}