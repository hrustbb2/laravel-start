<?php

namespace Src\Common\Interfaces\Adapters;

use Src\Common\Interfaces\Adapters\IAdaptersFactory;

interface IFactory {
    
    /**
     * @return IAdaptersFactory
     */
    public function getAdaptersFactory(string $name);
}