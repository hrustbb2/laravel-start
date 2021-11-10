<?php

namespace Src\Common\Pages\Sidebar;

use Src\Common\Interfaces\Pages\Sidebar\IFactory;
use Src\Common\Interfaces\Pages\Sidebar\IMenu;

class Factory implements IFactory {

    /**
     * @var IMenu
     */
    protected ?IMenu $menu = null;

    protected function newMenu()
    {
        return new Menu();
    }

    public function getMenu()
    {
        if($this->menu === null){
            $this->menu = $this->newMenu();
            $this->menu->setSidebarFactory($this);
        }
        return $this->menu;
    }

    protected function newItem()
    {
        return new Item();
    }

    public function createItem()
    {
        $item = $this->newItem();
        $item->setSidebarFactory($this);
        return $item;
    }

    protected function newSubItem()
    {
        return new SubItem();
    }

    public function createSubItem()
    {
        $subItem = $this->newSubItem();
        $subItem->setSidebarFactory($this);
        return $subItem;
    }

}