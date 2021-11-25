<?php

namespace Src\Sidebar;

use Src\Sidebar\Interfaces\IFactory;
use Src\Sidebar\Interfaces\IModulesProvider;
use Src\Common\Interfaces\Adapters\IRoute;
use Src\Common\Pages\Sidebar\Factory as BaseFactory;

class Factory extends BaseFactory implements IFactory {

    protected IRoute $routeAdapter;

    protected array $settings = [];

    public function loadSettings(array $settings)
    {
        $this->settings = $settings;
    }

    public function injectModules(IModulesProvider $provider)
    {
        $this->routeAdapter = $provider->getCommonFactory()->getAdaptersFactory($this->settings[IFactory::FRAMEWORK_NAME])->getRoute();
    }
    
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
                ],
            ],
            [
                'title' => 'JsonObjects',
                'url' => $this->routeAdapter->getRoute('admin.jsonObjects.dir'),
            ]
        ];
        $menu->load($menuData);
        return $menu;
    }

}