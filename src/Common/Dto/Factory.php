<?php

namespace Src\Common\Dto;

use Src\Common\Interfaces\Dto\IFactory;
use Src\Common\Interfaces\Dto\Object\IFactory as IObjectFactory;
use Src\Common\Dto\Object\Factory as ObjectFactory;

class Factory implements IFactory {
    
    protected ?IObjectFactory $objectFactory = null;

    public function getObjectFactory(): IObjectFactory
    {
        if($this->objectFactory === null){
            $this->objectFactory = new ObjectFactory();
        }
        return $this->objectFactory;
    }

}