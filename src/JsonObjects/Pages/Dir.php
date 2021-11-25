<?php

namespace Src\JsonObjects\Pages;

use Src\Common\Pages\Page;
use Src\JsonObjects\Interfaces\Pages\IDir;

class Dir extends Page implements IDir {

    

    public function init()
    {

    }
    
    public function getCssStack()
    {
        return [

        ];
    }

    public function getJsStack()
    {
        return [

        ];
    }

    public function getJsSettings()
    {
        return [

        ];
    }

    public function getTitle()
    {
        return 'JSON Objects';
    }

    public function getBreadcrumbs()
    {
        return [];
    }

}