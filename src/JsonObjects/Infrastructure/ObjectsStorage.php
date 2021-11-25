<?php

namespace Src\JsonObjects\Infrastructure;

use Src\Common\Infrastructure\BaseStorage;
use Src\JsonObjects\Interfaces\Infrastructure\IObjectsStorage;
use Src\JsonObjects\Interfaces\Infrastructure\IObjectQuery;

class ObjectsStorage extends BaseStorage implements IObjectsStorage {

    protected IObjectQuery $objectsQuery;

    public function setObjectsQuery(IObjectQuery $query)
    {
        $this->objectsQuery = $query;
    }

    public function getByDirId(string $dirId, array $dsl = []):array
    {
        return $this->objectsQuery->select($dsl)->whereDirId($dirId)->all();
    }

}