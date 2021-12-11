<?php

namespace Src\JsonObjects;

use Src\JsonObjects\Interfaces\IFactory;
use Src\JsonObjects\Interfaces\IModulesProvider;
use Src\Lib\CategoriesTree\Interfaces\IFactory as IDirsTreeFactory;
use Src\Sidebar\Interfaces\IFactory as ISidebarFactory;
use Src\Common\Interfaces\IFactory as ICommonFactory;
use Src\JsonObjects\Interfaces\Dto\IFactory as IDtoFactory;
use Src\JsonObjects\Dto\Factory as DtoFactory;
use Src\JsonObjects\Interfaces\Pages\IFactory as IPagesFactory;
use Src\JsonObjects\Pages\Factory as PagesFactory;
use Src\JsonObjects\Interfaces\Infrastructure\IFactory as IInfrastructureFactory;
use Src\JsonObjects\Infrastructure\Factory as InfrastructureFactory;
use Src\JsonObjects\Interfaces\Application\IFactory as IApplicationFactory;
use Src\JsonObjects\Application\Factory as ApplicationFactory;

class Factory implements IFactory {

    protected IDirsTreeFactory $dirsTreeFactory;

    protected ISidebarFactory $sidebarFactory;

    protected ICommonFactory $commonFactory;
    
    protected ?IDtoFactory $dtoFactory = null;

    protected ?IPagesFactory $pagesFactory = null;

    protected ?IApplicationFactory $applicationFactory = null;

    protected ?IInfrastructureFactory $infrastructureFactory = null;

    protected array $settings = [];

    public function injectModules(IModulesProvider $provider)
    {
        $this->sidebarFactory = $provider->getSidebarFactory();
        $this->commonFactory = $provider->getCommonFactory();
    }

    public function getSidebarFactory():ISidebarFactory
    {
        return $this->sidebarFactory;
    }

    public function getCommonFactory():ICommonFactory
    {
        return $this->commonFactory;
    }

    public function setDirsTreeFactory(IDirsTreeFactory $factory)
    {
        $this->dirsTreeFactory = $factory;
    }

    public function getDirsTreeFactory():IDirsTreeFactory
    {
        return $this->dirsTreeFactory;
    }

    public function loadSettings(array $settings)
    {
        $this->settings = $settings;
    }

    public function getSetting(string $key)
    {
        return $this->settings[$key];
    }

    public function getDtoFactory():IDtoFactory
    {
        if($this->dtoFactory === null){
            $this->dtoFactory = new DtoFactory();
            $this->dtoFactory->setModulesFactory($this);
        }
        return $this->dtoFactory;
    }

    public function getPagesFactory():IPagesFactory
    {
        if($this->pagesFactory === null){
            $this->pagesFactory = new PagesFactory();
            $this->pagesFactory->setModuleFactory($this);
        }
        return $this->pagesFactory;
    }

    public function getInfrastructureFactory():IInfrastructureFactory
    {
        if($this->infrastructureFactory === null){
            $this->infrastructureFactory = new InfrastructureFactory();
            $this->infrastructureFactory->setModuleFactory($this);
        }
        return $this->infrastructureFactory;
    }

    public function getApplicationFactory():IApplicationFactory
    {
        if($this->applicationFactory === null){
            $this->applicationFactory = new ApplicationFactory();
            $this->applicationFactory->setModuleFactory($this);
        }
        return $this->applicationFactory;
    }

}