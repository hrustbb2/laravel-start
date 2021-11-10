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
    public abstract function getCssStack();

    /**
     * @return array
     */
    public abstract function getJsStack();

    /**
     * @return array
     */
    public function getCommonJsSettings()
    {
        return [];
    }

    /**
     * @return array
     */
    public abstract function getJsSettings();

    /**
     * @return string
     */
    public abstract function getTitle();

    public function setSidebar(IMenu $menu)
    {
        $this->sidebar = $menu;
    }

    /**
     * @return IMenu
     */
    public function getSidebar()
    {
        return $this->sidebar;
    }

}