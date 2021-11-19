<?php

namespace Src\Sidebar\Interfaces;

interface IModulesProvider {
    /**
     * @return IFactory
     */
    public function getSidebarFactory();
}