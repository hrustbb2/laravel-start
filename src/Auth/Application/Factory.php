<?php

namespace Src\Auth\Application;

use Src\Auth\Interfaces\Application\IFactory;
use Src\Auth\Interfaces\IFactory as IModuleFactory;
use Src\Auth\Interfaces\Application\IDomain;

class Factory implements IFactory {

    protected IModuleFactory $moduleFactory;

    protected ?IDomain $domain = null;

    public function setModuleFactory(IModuleFactory $factory)
    {
        $this->moduleFactory = $factory;
    }

    protected function createValidator()
    {
        return new Validator();
    }

    public function getDomain()
    {
        if($this->domain === null){
            $this->domain = new Domain();
            $framework = $this->moduleFactory->getSetting(IModuleFactory::FRAMEWORK_NAME);
            $authAdapter = $this->moduleFactory->getCommonFactory()->getAdaptersFactory($framework)->getAuth();
            $this->domain->setAuthAdapter($authAdapter);
            $validator = $this->createValidator();
            $this->domain->setValidator($validator);
        }
        return $this->domain;
    }

}