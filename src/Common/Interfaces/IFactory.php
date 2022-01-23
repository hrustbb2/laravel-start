<?php

namespace Src\Common\Interfaces;

use Src\Common\Interfaces\Pages\IFactory as IPagesFactory;
use Src\Common\Interfaces\Adapters\IAdaptersFactory;
use Src\Common\Interfaces\Dto\IFactory as IDtoFactory;

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

    /**
     * @return IDtoFactory
     */
    public function getDtoFactory();

}