<?php

namespace Src\Auth\Laravel;

use Src\Auth\Interfaces\Laravel\IFactory;
use Src\Auth\Interfaces\IFactory as IModuleFactory;
use Src\Auth\Interfaces\Laravel\IUserProvider;
use Src\Auth\Laravel\UserProvider;

class Factory implements IFactory {

    protected IModuleFactory $moduleFactory;

    protected ?IUserProvider $userProvider = null;

    public function setModuleFactory(IModuleFactory $factory)
    {
        $this->moduleFactory = $factory;
    }

    public function createUser()
    {
        return new User();
    }

    public function getUserProvider()
    {
        if($this->userProvider === null){
            $this->userProvider = new UserProvider();
            $userStorage = $this->moduleFactory->getInfrastructureFactory()->getStorage();
            $this->userProvider->setUserStorage($userStorage);
            $this->userProvider->setFactory($this);
        }
        return $this->userProvider;
    }

}