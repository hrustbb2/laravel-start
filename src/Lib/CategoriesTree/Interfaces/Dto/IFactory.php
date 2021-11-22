<?php

namespace Src\Lib\CategoriesTree\Interfaces\Dto;

use Src\Lib\CategoriesTree\Interfaces\IFactory as ILibFactory;

interface IFactory {
    public function setLibFactory(ILibFactory $factory);
    /**
     * @return IPersist
     */
    public function createPersist();
}