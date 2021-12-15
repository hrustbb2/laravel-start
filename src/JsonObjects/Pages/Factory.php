<?php

namespace Src\JsonObjects\Pages;

use Src\JsonObjects\Interfaces\Pages\IFactory;
use Src\JsonObjects\Interfaces\IFactory as IModuleFactory;
use Src\JsonObjects\Interfaces\Pages\IDir;
use Src\JsonObjects\Interfaces\Pages\IItem;

class Factory implements IFactory {

    protected IModuleFactory $moduleFactory;

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
        $itemStorage = $this->moduleFactory->getInfrastructureFactory()->getStorage();
        $page->setItemStorage($itemStorage);
        $itemDtoFactory = $this->moduleFactory->getDtoFactory()->getItemFactory();
        $page->setItemDtoFactory($itemDtoFactory);
        $frameworkName = $this->moduleFactory->getSetting(IModuleFactory::FRAMEWORK_NAME);
        $routeAdapter = $this->moduleFactory->getCommonFactory()->getAdaptersFactory($frameworkName)->getRoute();
        $page->setRouteAdapter($routeAdapter);
        $page->init($currentDirId);
        return $page;
    }

    public function createItemPage(string $itemId):IItem
    {
        $page = new Item();
        $sidebarMenu = $this->moduleFactory->getSidebarFactory()->getMenu();
        $page->setSidebar($sidebarMenu);
        $itemStorage = $this->moduleFactory->getInfrastructureFactory()->getStorage();
        $page->setItemStorage($itemStorage);
        $itemDtoFactory = $this->moduleFactory->getDtoFactory()->getItemFactory();
        $page->setItemDtoFactory($itemDtoFactory);
        $page->init($itemId);
        return $page;
    }

}