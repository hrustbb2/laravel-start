<?php

namespace Src\Lib\CategoriesTree\Dto;

use Src\Lib\CategoriesTree\Interfaces\Dto\IResource;
use Src\Lib\CategoriesTree\Interfaces\Dto\IFactory as IDtoFactory;

class Resource extends AbstractCategory implements IResource {

    /**
     * @var IDtoFactory
     */
    protected $dtoFactory;

    public function setDtoFactory(IDtoFactory $factory)
    {
        $this->dtoFactory = $factory;
    }
    
    public function loadPath(array $data)
    {
        $this->path = [];
        foreach($data as $item){
            $pathItem = $this->dtoFactory->createResource();
            $pathItem->load($item);
            $this->path[] = $pathItem;
        }
    }

    public function loadParent(array $data)
    {
        $this->parent = $this->dtoFactory->createResource();
        $this->load($data);
    }

}