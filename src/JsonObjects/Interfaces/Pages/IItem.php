<?php

namespace Src\JsonObjects\Interfaces\Pages;

use Src\Common\Interfaces\Pages\IAbstractPage;
use Src\Common\Interfaces\Adapters\IRoute;

interface IItem extends IAbstractPage {
    public function setRouteAdapter(IRoute $adapter):void;
    public function getBreadcrumbs():array;
}