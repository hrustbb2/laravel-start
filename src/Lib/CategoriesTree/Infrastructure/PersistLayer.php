<?php

namespace Src\Lib\CategoriesTree\Infrastructure;

use Src\Lib\CategoriesTree\Interfaces\Infrastructure\IPersistLayer;
use Src\Lib\CategoriesTree\Interfaces\Dto\IPersist;
use Illuminate\Support\Facades\DB;

class PersistLayer implements IPersistLayer {

    protected string $tableName;

    public function setTableName(string $tableName)
    {
        $this->tableName = $tableName;
    }

    public function newDir(IPersist $dto):bool
    {
        $attrs = $dto->getInsertAttributes();
        $qb = DB::table($this->tableName);
        return $qb->insert($attrs);
    }

}