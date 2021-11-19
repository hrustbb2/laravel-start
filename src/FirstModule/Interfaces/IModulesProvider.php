<?php

namespace Src\FirstModule\Interfaces;

use Src\Common\Interfaces\IFactory as ICommonFactory;
use Src\Sidebar\Interfaces\IFactory as ISidebarFactory;

interface IModulesProvider {
    /**
     * @return ICommonFactory
     */
    public function getCommonFactory();

    /**
     * @return ISidebarFactory
     */
    public function getSidebarFactory();

    /**
     * @return IFactory
     */
    public function getFirstModule();
}