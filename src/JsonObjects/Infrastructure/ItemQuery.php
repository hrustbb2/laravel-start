<?php

namespace Src\JsonObjects\Infrastructure;

use Src\Common\Infrastructure\SqlQueryBase;
use Src\JsonObjects\Interfaces\Infrastructure\IItemQuery;
use Illuminate\Support\Facades\DB;

class ItemQuery extends SqlQueryBase implements IItemQuery {

    protected string $tableName;

    public function setTableName(string $tableName)
    {
        $this->tableName = $tableName;
    }

    public function select(array $fields = [])
    {
        $this->queryBuilder = DB::table($this->tableName);
        $select = $this->getSelectSection($fields, ['id', 'dir_id', 'key', 'object'], $this->tableName, 'object_');
        $this->queryBuilder->select($select);
        $this->arrayProcConf = ['prefix' => 'object_'];
        return $this;
    }

    public function whereId(string $id)
    {
        $this->queryBuilder->where($this->tableName . '.id', '=', $id);
        return $this;
    }

    public function whereKey(string $key)
    {
        $this->queryBuilder->where($this->tableName . '.key', '=', $key);
        return $this;
    }

    public function whereDirId(string $dirId)
    {
        $this->queryBuilder->where($this->tableName . '.dir_id', '=', $dirId);
        return $this;
    }

}