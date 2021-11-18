<?php

namespace Src\Common\Tests\Pages\Sidebar;

use Tests\TestCase;
use Src\Common\Factory;

class MenuTest extends TestCase {

    public function testGetMenuItems()
    {
        $factory = new Factory();
        $menu = $factory->getPagesFactory()->getSidebarFactory()->getMenu();
        $menuData = [
            [
                'title' => 'title_1',
                'url' => '#',
            ],
            [
                'title' => 'title_2',
                'url' => '#',
                'subItems' => [
                    [
                        'title' => 'sub_1',
                        'url' => 'url_1',
                        'bage' => '2'
                    ]
                ],
            ],
        ];
        $menu->load($menuData);
        $menuItems = $menu->getMenuItems();
        $this->assertEquals($menuItems[0]->getTitle(), 'title_1');

        $subitems = $menu->getMenuItems()[1]->getSubItems();
        $this->assertEquals($subitems[0]->getTitle(), 'sub_1');
    }

}