<?php

namespace Src\Common\Pages;

use Src\Common\Interfaces\Pages\IFactory;
use Src\Common\Interfaces\Pages\Sidebar\IFactory as ISidebarFactory;
use Src\Common\Pages\Sidebar\Factory as SidebarFactory;

class Factory implements IFactory {

    /**
     * @var ISidebarFactory
     */
    protected $sidebarFactory = null;

    protected function newSidebarFactory()
    {
        return new SidebarFactory();
    }

    public function getSidebarFactory()
    {
        if($this->sidebarFactory === null){
            $this->sidebarFactory = $this->newSidebarFactory();
        }
        return $this->sidebarFactory;
    }

}