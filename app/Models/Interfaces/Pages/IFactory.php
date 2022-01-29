<?php

namespace App\Models\Interfaces\Pages;

use App\Models\Interfaces\IFactory as IModulesFactory;
use App\Models\Interfaces\Pages\IHome;

interface IFactory {
    public function setModulesFactory(IModulesFactory $factory):void;
    public function createHome():IHome;
}