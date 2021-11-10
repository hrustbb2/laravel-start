<?php

namespace Src\FirstModule\Interfaces\Pages;

use Src\Common\Interfaces\Pages\IAbstractPage;

interface IMainPage extends IAbstractPage {
    /**
     * return array
     */
    public function getBreadcrumbs();
}