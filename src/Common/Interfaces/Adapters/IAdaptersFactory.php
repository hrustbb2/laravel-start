<?php

namespace Src\Common\Interfaces\Adapters;

use Src\Common\Interfaces\Adapters\IAuth;
use Src\Common\Interfaces\Adapters\IHash;
use Src\Common\Interfaces\Adapters\IRoute;

interface IAdaptersFactory {
    /**
     * @return IAuth
     */
    public function getAuth();

    /**
     * @return IHash
     */
    public function getHash();

    /**
     * @return IRoute
     */
    public function getRoute();
}