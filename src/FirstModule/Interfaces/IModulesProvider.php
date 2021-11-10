<?php

namespace Src\FirstModule\Interfaces;

use Src\Common\Interfaces\IFactory as ICommonFactory;

interface IModulesProvider {
    /**
     * @return ICommonFactory
     */
    public function getCommonFactory();

    /**
     * @return IFactory
     */
    public function getFirstModule();
}