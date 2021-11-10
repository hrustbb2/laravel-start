<?php

namespace Src\Common\Interfaces\Pages;

use Src\Common\Interfaces\Pages\Sidebar\IFactory as ISidebarFactory;

interface IFactory {
    /**
     * @return ISidebarFactory
     */
    public function getSidebarFactory();
}