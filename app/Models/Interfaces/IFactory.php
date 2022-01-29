<?php

namespace App\Models\Interfaces;

use App\Models\Interfaces\Pages\IFactory as IPagesFactory;
use Src\JsonObjects\Interfaces\IModulesProvider;
use Src\JsonObjects\Interfaces\IFactory as IJsonObjectsFactory;

interface IFactory {
    public function injectModules(IModulesProvider $provider):void;
    public function getJsonObjects():IJsonObjectsFactory;
    public function getPagesFactory():IPagesFactory;
}