<?php

namespace Src\Lib\CategoriesTree\Infrastructure;

use Src\Lib\CategoriesTree\Interfaces\Infrastructure\IQuery;
use Src\Common\Infrastructure\SqlQueryBase;
use Illuminate\Support\Facades\DB;

class Query extends SqlQueryBase implements IQuery {

    protected string $tableName;

    protected bool $isParentJoined = false;

    public function setTableName(string $tableName)
    {
        $this->tableName = $tableName;
    }

    protected function reset()
    {
        $this->queryBuilder = DB::table($this->tableName);
        $this->isParentJoined = false;
    }

    public function select(array $fields)
    {
        $this->reset();
        $selectSection = $this->getSelectSection($fields, ['id', 'matherial_path', 'parent_id', 'name'], $this->tableName, 'category_');
        $this->queryBuilder->select($selectSection);
        $this->arrayProcConf = ['prefix' => 'category_'];
        return $this;
    }

    public function whereId($id)
    {
        $this->queryBuilder->where($this->tableName . '.id', '=', $id);
        return $this;
    }

    public function whereIdIn(array $ids)
    {
        $this->queryBuilder->whereIn($this->tableName . '.id', $ids);
        return $this;
    }

    public function whereParentId($parentId)
    {
        $this->queryBuilder->where($this->tableName . '.parent_id', '=', $parentId);
        return $this;
    }

    public function withParent(array $fields)
    {
        $this->joinParend();
        $selectSection = $this->getSelectSection($fields, ['id', 'matherial_path', 'parent_id', 'name'], $this->tableName, 'parent_');
        $this->queryBuilder->addSelect($selectSection);
        $this->arrayProcConf['parent'] = ['prefix' => 'parent_'];
        return $this;
    }

    protected function joinParend()
    {
        if(!$this->isParentJoined){
            $first = $this->tableName . '.id';
            $two = $this->tableName . '.parent_id';
            $this->queryBuilder->leftJoin($this->tableName . ' AS parent', $first, '=', $two);
            $this->isParentJoined = true;
        }
    }

}