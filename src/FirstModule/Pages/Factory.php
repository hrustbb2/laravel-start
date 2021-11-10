<?php

namespace Src\FirstModule\Pages;

use Src\FirstModule\Interfaces\Pages\IFactory;
use Src\FirstModule\Interfaces\IFactory as IModuleFactory;

class Factory implements IFactory {

    protected IModuleFactory $moduleFactory;

    public function setModuleFactory(IModuleFactory $factory)
    {
        $this->moduleFactory = $factory;
    }

    public function createMainPage()
    {
        $page = new MainPage();
        $sidebarMenu = $this->moduleFactory->getCommonFactory()->getPagesFactory()->getSidebarFactory()->getMenu();
        $page->setSidebar($sidebarMenu);
        return $page;
    }

}