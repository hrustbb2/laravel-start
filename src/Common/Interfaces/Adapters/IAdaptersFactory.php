<?php

namespace Src\Common\Interfaces\Adapters;

use Src\Common\Interfaces\Adapters\IAuth;
use Src\Common\Interfaces\Adapters\IHash;
use Src\Common\Interfaces\Adapters\IRoute;
use Src\Common\Interfaces\Adapters\ILog;

interface IAdaptersFactory {
    /**
     * @return IAuth
     */
    public function getAuth():IAuth;

    /**
     * @return IHash
     */
    public function getHash():IHash;

    /**
     * @return IRoute
     */
    public function getRoute():IRoute;

    /**
     * @return ILog
     */
    public function getLog():ILog;
}