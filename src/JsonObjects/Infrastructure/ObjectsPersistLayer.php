<?php

namespace Src\JsonObjects\Infrastructure;

use Src\JsonObjects\Interfaces\Infrastructure\IObjectsPersistLayer;
use Src\JsonObjects\Interfaces\Dto\Item\IPersistItem;
use Illuminate\Support\Facades\DB;

class ObjectsPersistLayer implements IObjectsPersistLayer {

    protected string $tableName;

    public function setTableName(string $tableName)
    {
        $this->tableName = $tableName;
    }

    public function create(IPersistItem $dto):bool
    {
        $qb = DB::table($this->tableName);
        $attrs = $dto->getInsertAttrs();
        return $qb->insert($attrs);
    }

}