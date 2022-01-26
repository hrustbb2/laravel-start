<?php

namespace Src\Auth\Pages;

use Src\Auth\Interfaces\Pages\IFactory;
use Src\Auth\Interfaces\IFactory as IModuleFactory;

class Factory implements IFactory {

    protected IModuleFactory $moduleFactory;

    public function setModuleFactory(IModuleFactory $factory)
    {
        $this->moduleFactory = $factory;
    }

    public function createLoginForm()
    {
        $page = new LoginForm();
        $frameworkName = $this->moduleFactory->getSetting(IModuleFactory::FRAMEWORK_NAME);
        $routeAdapter = $this->moduleFactory->getCommonFactory()->getAdaptersFactory($frameworkName)->getRoute();
        $page->setRouteAdapter($routeAdapter);
        $successUrl = $this->moduleFactory->getSetting(IModuleFactory::SUCCESS_URL);
        $page->setSuccessUrl($successUrl);
        return $page;
    }

}