<?php

namespace Src\JsonObjects\Infrastructure;

use Src\Common\Infrastructure\BaseStorage;
use Src\JsonObjects\Interfaces\Infrastructure\IItemStorage;
use Src\JsonObjects\Interfaces\Infrastructure\IItemQuery;
use Src\Lib\CategoriesTree\Interfaces\Infrastructure\IStorage as IDirStorage;

class ItemStorage extends BaseStorage implements IItemStorage {

    protected IItemQuery $objectsQuery;

    protected IDirStorage $dirStorage;

    public function setObjectsQuery(IItemQuery $query)
    {
        $this->objectsQuery = $query;
    }

    public function setDirStorage(IDirStorage $storage):void
    {
        $this->dirStorage = $storage;
    }

    public function getById(string $itemId, array $dsl = []):array
    {
        $itemData = $this->objectsQuery->select($dsl)->whereId($itemId)->one();
        if(empty($itemData)){
            return [];
        }
        if(key_exists('dir', $dsl)){
            $dirId = $itemData['dir_id'];
            $dirData = $this->dirStorage->getById($dirId, $dsl['dir']);
            $itemData['dir'] = [
                $dirId => $dirData,
            ];
        }
        return $itemData;
    }

    public function getByDirId(string $dirId, array $dsl = []):array
    {
        return $this->objectsQuery->select($dsl)->whereDirId($dirId)->all();
    }

}