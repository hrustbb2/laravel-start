<?php

namespace Src\Sidebar\Interfaces;

use Src\Common\Interfaces\IFactory as ICommonFactory;

interface IModulesProvider {
    /**
     * @return IFactory
     */
    public function getSidebarFactory();

    public function getCommonFactory():ICommonFactory;
}