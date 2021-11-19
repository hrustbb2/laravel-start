<?php

namespace Src\Sidebar;

use Src\Sidebar\Interfaces\IFactory;
use Src\Common\Pages\Sidebar\Factory as BaseFactory;

class Factory extends BaseFactory implements IFactory {

    public function getMenu()
    {
        $menu = parent::getMenu();
        $menuData = [
            [
                'title' => 'Item',
                'url' => '',
                'subItems' => [
                    [
                        'title' => 'SubItem1',
                        'url' => '#',
                        'bage' => '10',
                    ],
                    [
                        'title' => 'SubItem2',
                        'url' => '#',
                        'bage' => '20',
                    ],
                ]
            ]
        ];
        $menu->load($menuData);
        return $menu;
    }

}