<?php

namespace Src\Common\Adapters;

use Src\Common\Interfaces\Adapters\IFactory;
use Src\Common\Interfaces\IFactory as ICommonFactory;
use Src\Common\Interfaces\Adapters\IAdaptersFactory;
use Src\Common\Adapters\Laravel\Factory as LaravelFactory;

class Factory implements IFactory {

    protected ?IAdaptersFactory $adaptersFactory = null;

    protected function newAdaptersFactory(string $name)
    {
        if($name === ICommonFactory::LARAVEL){
            return new LaravelFactory();
        }
    }
    
    public function getAdaptersFactory(string $name)
    {
        if($this->adaptersFactory === null){
            $this->adaptersFactory = $this->newAdaptersFactory($name);
        }
        return $this->adaptersFactory;
    }

}