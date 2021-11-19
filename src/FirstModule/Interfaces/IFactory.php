<?php

namespace Src\FirstModule\Interfaces;

use Src\FirstModule\Interfaces\Pages\IFactory as IPagesFactory;
use Src\Common\Interfaces\IFactory as ICommonFactory;
use Src\Sidebar\Interfaces\IFactory as ISidebarFactory;
use Src\FirstModule\Interfaces\IModulesProvider;

interface IFactory {
    public function injectModules(IModulesProvider $provider);

    /**
     * @return ICommonFactory
     */
    public function getCommonFactory();

    /**
     * @return ISidebarFactory
     */
    public function getSidebarFactory();

    /**
     * @return IPagesFactory
     */
    public function getPagesFactory();
}