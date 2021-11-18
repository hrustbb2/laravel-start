<?php

namespace Src\Auth\Infrastructure;

use Src\Common\Infrastructure\SqlQueryBase;
use Src\Auth\Interfaces\Infrastructure\IQuery;
use Illuminate\Support\Facades\DB;

class Query extends SqlQueryBase implements IQuery {

    protected string $tableName;

    public function setTableName(string $tableName)
    {
        $this->tableName = $tableName;
    }

    public function select(array $fields = [])
    {
        $this->queryBuilder = DB::table($this->tableName);
        $selectSection = $this->getSelectSection($fields, ['id', 'email', 'password_hash'], $this->tableName, 'user_');
        $this->queryBuilder->select($selectSection);
        $this->arrayProcConf = ['prefix' => 'user_'];
        return $this;
    }

    public function whereId(string $id)
    {
        $this->queryBuilder->where($this->tableName . '.id', '=', $id);
        return $this;
    }

    public function whereEmail(string $email)
    {
        $this->queryBuilder->where($this->tableName . '.email', '=', $email);
        return $this;
    }

}