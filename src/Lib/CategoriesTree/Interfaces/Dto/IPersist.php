<?php

namespace Src\Lib\CategoriesTree\Interfaces\Dto;

use Src\Lib\CategoriesTree\Interfaces\Dto\IFactory as IDtoFactory;

interface IPersist extends IAbstractCategory {
    public function setDtoFactory(IDtoFactory $factory);
    public function getInsertAttributes():array;
}