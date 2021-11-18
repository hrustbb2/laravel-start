<?php

namespace Src\Common\Adapters\Laravel;

use Src\Common\Interfaces\Adapters\IAdaptersFactory;
use Src\Common\Interfaces\Adapters\IAuth;
use Src\Common\Adapters\Laravel\Auth;
use Src\Common\Interfaces\Adapters\IHash;
use Src\Common\Adapters\Laravel\Hash;
use Src\Common\Interfaces\Adapters\IRoute;
use Src\Common\Adapters\Laravel\Route;

class Factory implements IAdaptersFactory {

    protected ?IAuth $auth = null;

    protected ?IHash $hash = null;

    protected ?IRoute $route = null;

    public function getAuth()
    {
        if($this->auth === null){
            $this->auth = new Auth();
        }
        return $this->auth;
    }

    public function getHash()
    {
        if($this->hash === null){
            $this->hash = new Hash();
        }
        return $this->hash;
    }

    public function getRoute()
    {
        if($this->route === null){
            $this->route = new Route();
        }
        return $this->route;
    }

}