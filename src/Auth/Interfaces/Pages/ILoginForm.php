<?php

namespace Src\Auth\Interfaces\Pages;

use Src\Common\Interfaces\Adapters\IRoute;

interface ILoginForm {
    public function setRouteAdapter(IRoute $adapter):void;
    public function setSuccessUrl(string $url):void;
    public function getTitle():string;
    public function getJsStack():array;
    public function getCssStack():array;
    public function getJsSettings():array;
}