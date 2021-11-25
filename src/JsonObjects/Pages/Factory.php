<?php

namespace Src\JsonObjects\Pages;

use Src\JsonObjects\Interfaces\Pages\IFactory;
use Src\JsonObjects\Interfaces\IFactory as IModuleFactory;
use Src\JsonObjects\Interfaces\Pages\IDir;

class Factory implements IFactory {

    protected IModuleFactory $moduleFactory;

    protected ?IDir $dirPage = null;

    public function setModuleFactory(IModuleFactory $factory)
    {
        $this->moduleFactory = $factory;
    }

    public function createDirPage(string $currentDirId):IDir
    {
        $page = new Dir();
        $sidebarMenu = $this->moduleFactory->getSidebarFactory()->getMenu();
        $page->setSidebar($sidebarMenu);
        $dirsStorage = $this->moduleFactory->getDirsTreeFactory()->getInfrastructureFactory()->getStorage();
        $page->setDirsStorage($dirsStorage);
        $dirsDtoFactory = $this->moduleFactory->getDirsTreeFactory()->getDtoFactory();
        $page->setDirsDtoFactory($dirsDtoFactory);
        $page->init($currentDirId);
        return $page;
    }

}