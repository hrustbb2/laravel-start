<?php

namespace Src\Lib\CategoriesTree\Interfaces;

use Src\Lib\CategoriesTree\Interfaces\Dto\IFactory as IDtoFactory;
use Src\Lib\CategoriesTree\Interfaces\Infrastructure\IFactory as IInfrastructureFactory;

interface IFactory {
    const TABLE_NAME = 'table_name';
    public function loadSettings(array $settings);
    public function getSetting(string $key);
    public function getDtoFactory():IDtoFactory;
    public function getInfrastructureFactory():IInfrastructureFactory;
}