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

    protected function creteDataBuilder()
    {
        $dataBuilder = new DataBuilder();
        $storage = $this->moduleFactory->getDirsTreeFactory()->getInfrastructureFactory()->getStorage();
        $dataBuilder->setDirStorage($storage);
        return $dataBuilder;
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
            $storage = $this->moduleFactory->getInfrastructureFactory()->getStorage();
            $this->domain->setStorage($storage);
            $dataBuilder = $this->creteDataBuilder();
            $this->domain->setDataBuilder($dataBuilder);
            $dirValidator = $this->moduleFactory->getDirsTreeFactory()->getApplicationFactory()->createValidator();
            $this->domain->setDirValidator($dirValidator);
            $dirDomain = $this->moduleFactory->getDirsTreeFactory()->getApplicationFactory()->getDomain();
            $this->domain->setDirDomain($dirDomain);
            $dirStorage = $this->moduleFactory->getDirsTreeFactory()->getInfrastructureFactory()->getStorage();
            $this->domain->setDirStorage($dirStorage);
        }
        return $this->domain;
    }

}