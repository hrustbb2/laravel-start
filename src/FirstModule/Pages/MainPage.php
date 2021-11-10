<?php

namespace Src\FirstModule\Pages;

use Src\Common\Pages\Page;
use Src\FirstModule\Interfaces\Pages\IMainPage;

class MainPage extends Page implements IMainPage {

    /**
     * @return array
     */
    public function getCssStack()
    {
        return [
            '<link rel="stylesheet" href="/admin-css/first-module-main.css?' . self::CSS_VERSION . '">',
        ];
    }

    /**
     * @return array
     */
    public function getJsStack()
    {
        return [
            '<script src="/admin-js/first-module-main.js?' . self::JS_VERSION . '"></script>',
        ];
    }

    /**
     * @return array
     */
    public function getJsSettings()
    {
        return [];
    }

    /**
     * @return string
     */
    public function getTitle()
    {
        return 'First module';
    }

    public function getBreadcrumbs()
    {
        return [];
    }

}