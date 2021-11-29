<?php

namespace Src\Lib\CategoriesTree;

use Src\Lib\CategoriesTree\Interfaces\IFactory;
use Src\Common\Interfaces\IFactory as ICommonFactory;
use Src\Lib\CategoriesTree\Interfaces\Dto\IFactory as IDtoFactory;
use Src\Lib\CategoriesTree\Dto\Factory as DtoFactory;
use Src\Lib\CategoriesTree\Interfaces\Infrastructure\IFactory as IInfrastructureFactory;
use Src\Lib\CategoriesTree\Infrastructure\Factory as InfrastructureFactory;
use Src\Lib\CategoriesTree\Interfaces\Application\IFactory as IApplicationFactory;
use Src\Lib\CategoriesTree\Application\Factory as ApplicationFactory;

class Factory implements IFactory {

    protected ICommonFactory $commonFactory;

    protected ?IDtoFactory $dtoFactory = null;

    protected ?IInfrastructureFactory $infrastructureFactory = null;

    protected ?IApplicationFactory $applicationFactory = null;

    protected array $settings;

    public function setCommonFactory(ICommonFactory $factory)
    {
        $this->commonFactory = $factory;
    }

    public function getCommonFactory():ICommonFactory
    {
        return $this->commonFactory;
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
            $this->dtoFactory->setLibFactory($this);
        }
        return $this->dtoFactory;
    }

    public function getInfrastructureFactory():IInfrastructureFactory
    {
        if($this->infrastructureFactory === null){
            $this->infrastructureFactory = new InfrastructureFactory();
            $this->infrastructureFactory->setLibFactory($this);
        }
        return $this->infrastructureFactory;
    }

    public function getApplicationFactory():IApplicationFactory
    {
        if($this->applicationFactory === null){
            $this->applicationFactory = new ApplicationFactory();
            $this->applicationFactory->setLibFactory($this);
        }
        return $this->applicationFactory;
    }

}