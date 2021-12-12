<?php

namespace Src\JsonObjects\Interfaces\Pages;

use Src\Common\Interfaces\Pages\IAbstractPage;

interface IItem extends IAbstractPage {
    public function getBreadcrumbs():array;
}