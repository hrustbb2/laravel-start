<?php

namespace Src\FirstModule\Interfaces\Pages;

use Src\FirstModule\Interfaces\IFactory as IModuleFactory;

interface IFactory {
    public function setModuleFactory(IModuleFactory $factory);
    /**
     * @return IMainPage
     */
    public function createMainPage();
}