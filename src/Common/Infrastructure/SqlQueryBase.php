<?php

namespace Src\Common\Infrastructure;

use Illuminate\Database\Query\Builder;
use hrustbb2\arrayproc;

abstract class SqlQueryBase {

    /**
     * @var Builder
     */
    protected $queryBuilder;

    /**
     * @var array
     */
    protected $arrayProcConf = [];

    /**
     * Формирует секцию селект
     *
     * @param array $fields
     * @param array $allowFields
     * @param string $table
     * @param string $prefix
     * @return array
     */
    protected function getSelectSection(array $fields, array $allowFields, string $table, string $prefix)
    {
        $result = [];
        if(empty($fields) || $fields[0] == '*'){
            $fields = $allowFields;
        }
        foreach ($fields as $field){
            if(in_array($field, $allowFields)){
                $result[] = $table . '.' . $field . ' AS ' . $prefix . $field;
            }
        }
        return $result;
    }

    /**
     * Добавить обязательные параметры
     *
     * @param array $fields
     * @param array $requiredFields
     * @return array
     */
    protected function addRequiredFields(array $fields, array $requiredFields)
    {
        if(empty($fields) || $fields[0] == '*'){
            return $fields;
        }
        $stringsFields = array_filter($fields, function($item){
            return gettype($item) != 'array';
        });
        $diff = array_diff($stringsFields, $requiredFields);
        return array_merge($requiredFields, $diff);
    }

    /**
     * Все данные
     *
     * @return array
     */
    public function all()
    {
        return $this->get();
    }

    /**
     * Одна запись
     *
     * @return array
     */
    public function one()
    {
        $data = $this->get();
        return array_pop($data) ?? [];
    }

    protected function get()
    {
        $dataArray = $this->queryBuilder->get()->all();
        $proc = new arrayproc\ArrayProcessor();
        return $proc->process($this->arrayProcConf, $dataArray)->resultArray();
    }
}
