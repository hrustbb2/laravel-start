<?php

namespace Src\Common\Interfaces;

use Src\Common\Interfaces\Pages\IFactory as IPagesFactory;

interface IFactory {
    
    /**
     * @return IPagesFactory
     */
    public function getPagesFactory();

}