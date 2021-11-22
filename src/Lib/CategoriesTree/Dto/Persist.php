<?php

namespace Src\Lib\CategoriesTree\Dto;

use Src\Lib\CategoriesTree\Interfaces\Dto\IPersist;
use Src\Lib\CategoriesTree\Interfaces\Dto\IFactory as IDtoFactory;

class Persist extends AbstractCategory implements IPersist {

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
        foreach($data as $itemData){
            $pathItem = $this->dtoFactory->createPersist();
            $pathItem->load($itemData);
        }
    }

    public function loadParent(array $data)
    {
        $this->parent = $this->dtoFactory->createPersist();
        $this->parent->load($data);
    }

    public function getInsertAttributes():array
    {
        $parentId = ($this->parent) ? $this->parent->getId() : 0;
        $attrs = [
            'id' => $this->id,
            'parent_id' => $parentId,
            'name' => $this->name,
        ];
        $pathIds = array_map(function(AbstractCategory $item){
            return $item->getId();
        }, $this->path);
        $pathIds[] = $parentId;
        $attrs['path'] = join('|', $pathIds);
        return $attrs;
    }

}