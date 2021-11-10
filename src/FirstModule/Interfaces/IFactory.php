<?php

namespace Src\FirstModule\Interfaces;

use Src\FirstModule\Interfaces\Pages\IFactory as IPagesFactory;
use Src\Common\Interfaces\IFactory as ICommonFactory;
use Src\FirstModule\Interfaces\IModulesProvider;

interface IFactory {
    public function injectModules(IModulesProvider $provider);

    /**
     * @return ICommonFactory
     */
    public function getCommonFactory();

    /**
     * @return IPagesFactory
     */
    public function getPagesFactory();
}