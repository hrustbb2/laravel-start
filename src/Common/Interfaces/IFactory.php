<?php

namespace Src\Common\Interfaces;

use Src\Common\Interfaces\Pages\IFactory as IPagesFactory;
use Src\Common\Interfaces\Adapters\IAdaptersFactory;

interface IFactory {
    
    const LARAVEL = 'laravel';

    /**
     * @return IPagesFactory
     */
    public function getPagesFactory();

    /**
     * @return IAdaptersFactory
     */
    public function getAdaptersFactory(string $name);

}