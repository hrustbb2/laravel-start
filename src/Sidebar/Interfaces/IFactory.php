<?php

namespace Src\Sidebar\Interfaces;

use Src\Common\Interfaces\Pages\Sidebar\IFactory as IBaseFactory;
use Src\Sidebar\Interfaces\IModulesProvider;

interface IFactory extends IBaseFactory {
    const FRAMEWORK_NAME = 'framework_name';
    public function loadSettings(array $settings);
    public function injectModules(IModulesProvider $provider);
}