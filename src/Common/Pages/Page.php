<?php

namespace Src\Common\Pages;

use Src\Common\Interfaces\Pages\Sidebar\IMenu;

abstract class Page {

    const CSS_VERSION = '1.0';

    const JS_VERSION = '1.0';

    protected IMenu $sidebar;

    /**
     * @return array
     */
    public abstract function getCssStack():array;

    /**
     * @return array
     */
    public abstract function getJsStack():array;

    /**
     * @return array
     */
    public function getCommonJsSettings():array
    {
        return [];
    }

    /**
     * @return array
     */
    public abstract function getJsSettings():array;

    /**
     * @return string
     */
    public abstract function getTitle():string;

    public function setSidebar(IMenu $menu):void
    {
        $this->sidebar = $menu;
    }

    /**
     * @return IMenu
     */
    public function getSidebar():IMenu
    {
        return $this->sidebar;
    }

}