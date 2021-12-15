<?php

namespace Src\JsonObjects\Infrastructure;

use Src\Common\Infrastructure\BaseStorage;
use Src\JsonObjects\Interfaces\Infrastructure\IItemStorage;
use Src\JsonObjects\Interfaces\Infrastructure\IItemQuery;

class ItemStorage extends BaseStorage implements IItemStorage {

    protected IItemQuery $objectsQuery;

    public function setObjectsQuery(IItemQuery $query)
    {
        $this->objectsQuery = $query;
    }

    public function getById(string $itemId, array $dsl = []):array
    {
        return $this->objectsQuery->select($dsl)->whereId($itemId)->one();
    }

    public function getByDirId(string $dirId, array $dsl = []):array
    {
        return $this->objectsQuery->select($dsl)->whereDirId($dirId)->all();
    }

}