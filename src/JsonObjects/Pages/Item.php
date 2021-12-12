<?php

namespace Src\JsonObjects\Pages;

use Src\Common\Pages\Page;
use Src\JsonObjects\Interfaces\Pages\IItem;

class Item extends Page implements IItem {

    public function getCssStack():array
    {
        return [
            '<link rel="stylesheet" href="/admin-css/json-objects-item.css?' . self::CSS_VERSION . '">',
        ];
    }

    public function getJsStack():array
    {
        return [
            '<script src="/admin-js/json-objects-item.js?' . self::JS_VERSION . '"></script>',
        ];
    }

    public function getJsSettings():array
    {
        return [];
    }

    public function getTitle():string
    {
        return '';
    }

    public function getBreadcrumbs():array
    {
        return [];
    }

}