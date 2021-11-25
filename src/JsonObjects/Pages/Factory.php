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
        if($this->dirPage === null){
            $this->dirPage = new Dir();
            $dirsStorage = $this->moduleFactory->getDirsTreeFactory()->getInfrastructureFactory()->getStorage();
            $this->dirPage->setDirsStorage($dirsStorage);
            $dirsDtoFactory = $this->moduleFactory->getDirsTreeFactory()->getDtoFactory();
            $this->dirPage->setDirsDtoFactory($dirsDtoFactory);
            $this->dirPage->init($currentDirId);
        }
        return $this->dirPage;
    }

}