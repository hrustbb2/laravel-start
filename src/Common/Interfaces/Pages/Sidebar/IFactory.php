<?php

namespace Src\Common\Interfaces\Pages\Sidebar;

interface IFactory {
    /**
     * @return IMenu
     */
    public function getMenu();

    /**
     * @return IItem
     */
    public function createItem();

    /**
     * @return ISubItem
     */
    public function createSubItem();
}