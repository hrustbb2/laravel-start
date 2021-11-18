<?php

namespace Src\Auth\Interfaces\Laravel;

use Illuminate\Contracts\Auth\UserProvider as UserProviderContract;
use Src\Auth\Interfaces\Infrastructure\IStorage as IUserStorage;
use Src\Auth\Interfaces\Laravel\IFactory;

interface IUserProvider extends UserProviderContract  {
    public function setUserStorage(IUserStorage $storage);
    public function setFactory(IFactory $factory);
}