<?php

namespace Src\Auth\Interfaces\Laravel;

use Src\Auth\Interfaces\IFactory as IModuleFactory;
use Src\Auth\Interfaces\Laravel\IUserProvider;

interface IFactory {
    public function setModuleFactory(IModuleFactory $factory);
    /**
     * @return IUser
     */
    public function createUser();

    /**
     * @return IUserProvider
     */
    public function getUserProvider();
}