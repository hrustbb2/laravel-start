<?php

namespace Src\JsonObjects\Application;

use Src\JsonObjects\Interfaces\Application\IFactory;
use Src\JsonObjects\Interfaces\IFactory as IModuleFactory;
use Src\JsonObjects\Interfaces\Application\IDomain;

class Factory implements IFactory {

    protected IModuleFactory $moduleFactory;

    protected ?IDomain $domain = null;

    public function setModuleFactory(IModuleFactory $factorory):void
    {
        $this->moduleFactory = $factorory;
    }

    protected function createValidator()
    {
        return new Validator();
    }

    public function getDomain():IDomain
    {
        if($this->domain === null){
            $this->domain = new Domain();
            $validator = new Validator();
            $this->domain->setValidator($validator);
            $dtoFactory = $this->moduleFactory->getDtoFactory();
            $this->domain->setDtoFactory($dtoFactory);
            $persistLayer = $this->moduleFactory->getInfrastructureFactory()->getPersistLayer();
            $this->domain->setPersistLayer($persistLayer);
        }
        return $this->domain;
    }

}