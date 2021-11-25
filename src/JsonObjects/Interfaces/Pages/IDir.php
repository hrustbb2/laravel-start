<?php

namespace Src\JsonObjects\Interfaces\Pages;

use Src\Common\Interfaces\Pages\IAbstractPage;
use Src\Lib\CategoriesTree\Interfaces\Infrastructure\IStorage as IDirsStorage;
use Src\Lib\CategoriesTree\Interfaces\Dto\IFactory as IDirsDtoFactory;

interface IDir extends IAbstractPage {
    public function setDirsStorage(IDirsStorage $storage);
    public function setDirsDtoFactory(IDirsDtoFactory $factory);
    public function init(string $currentDirId);
    public function getBreadcrumbs():array;
}