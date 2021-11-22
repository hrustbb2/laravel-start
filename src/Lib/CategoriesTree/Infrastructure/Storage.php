<?php

namespace Src\Lib\CategoriesTree\Infrastructure;

use Src\Lib\CategoriesTree\Interfaces\Infrastructure\IStorage;
use Src\Common\Infrastructure\BaseStorage;
use Src\Lib\CategoriesTree\Interfaces\Infrastructure\IQuery;

class Storage extends BaseStorage implements IStorage {

    protected IQuery $query;

    public function setQuery(IQuery $query)
    {
        $this->query = $query;
    }

    public function getById($id, array $dsl = []):array
    {
        $this->query->select($dsl)->whereId($id);
        if(key_exists('parent', $dsl)){
            $this->query->withParent($dsl['parent']);
        }
        $data = $this->query->one();
        if(key_exists('path', $dsl)){
            $ids = explode('|', $data['path']);
            $path = $this->query->select($dsl['path'])->whereIdIn($ids)->all();
            $data['path'] = $path;
        }
        return $data;
    }

    public function getByParentId($parentId, array $dsl = []):array
    {
        return $this->query->select($dsl)->whereParentId($parentId)->all();
    }

}