<?php

namespace Src\Auth;

use Src\Auth\Interfaces\IFactory;
use Src\Common\Interfaces\IFactory as ICommonFactory;
use Src\Auth\Interfaces\IModulesProvider;
use Src\Auth\Interfaces\Laravel\IFactory as ILaravelFactory;
use Src\Auth\Laravel\Factory as LaravelFactory;
use Src\Auth\Interfaces\Infrastructure\IFactory as IInfrastructureFactory;
use Src\Auth\Infrastructure\Factory as InfrastructureFactory;
use Src\Auth\Interfaces\Dto\IFactory as IDtoFactory;
use Src\Auth\Dto\Factory as DtoFactory;
use Src\Auth\Interfaces\Pages\IFactory as IPagesFactory;
use Src\Auth\Pages\Factory as PagesFactory;
use Src\Auth\Interfaces\Application\IFactory as IApplicationFactory;
use Src\Auth\Application\Factory as ApplicationFactory;

class Factory implements IFactory {

    protected ICommonFactory $commonFactory;
    
    protected ?ILaravelFactory $laravelFactory = null;
    
    protected ?IInfrastructureFactory $infrastructureFactory = null;

    protected ?IDtoFactory $dtoFactory = null;

    protected ?IPagesFactory $pageFactory = null;

    protected ?IApplicationFactory $applicationFactory = null;

    protected array $settings;

    public function injectModules(IModulesProvider $provider)
    {
        $this->commonFactory = $provider->getCommonFactory();
    }

    public function loadSettings(array $settings)
    {
        $this->settings = $settings;
    }

    public function getSetting(string $settingName)
    {
        return $this->settings[$settingName];
    }

    public function getCommonFactory()
    {
        return $this->commonFactory;
    }

    public function getLaravelFactory()
    {
        if($this->laravelFactory === null){
            $this->laravelFactory = new LaravelFactory();
            $this->laravelFactory->setModuleFactory($this);
        }
        return $this->laravelFactory;
    }

    public function getInfrastructureFactory()
    {
        if($this->infrastructureFactory === null){
            $this->infrastructureFactory = new InfrastructureFactory();
            $this->infrastructureFactory->setModuleFactory($this);
        }
        return $this->infrastructureFactory;
    }

    public function getDtoFactory()
    {
        if($this->dtoFactory === null){
            $this->dtoFactory = new DtoFactory();
            $this->dtoFactory->setModuleFactory($this);
        }
        return $this->dtoFactory;
    }

    public function getPagesFactory()
    {
        if($this->pageFactory === null){
            $this->pageFactory = new PagesFactory();
            $this->pageFactory->setModuleFactory($this);
        }
        return $this->pageFactory;
    }

    public function getApplicationFactory()
    {
        if($this->applicationFactory === null){
            $this->applicationFactory = new ApplicationFactory();
            $this->applicationFactory->setModuleFactory($this);
        }
        return $this->applicationFactory;
    }

}