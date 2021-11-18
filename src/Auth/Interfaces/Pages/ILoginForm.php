<?php

namespace Src\Auth\Interfaces\Pages;

use Src\Common\Interfaces\Adapters\IRoute;

interface ILoginForm {
    public function setRouteAdapter(IRoute $adapter);
    public function getTitle();
    public function getJsStack();
    public function getCssStack();
    public function getJsSettings();
}