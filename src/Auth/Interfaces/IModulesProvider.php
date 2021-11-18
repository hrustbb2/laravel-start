<?php

namespace Src\Auth\Interfaces;

use Src\Auth\Interfaces\IFactory as IAuthFactory;
use Src\Common\Interfaces\IFactory as ICommonFactory;

interface IModulesProvider {
    /**
     * @return IAuthFactory
     */
    public function getAuthModule();
    
    /**
     * @return ICommonFactory
     */
    public function getCommonFactory();
}