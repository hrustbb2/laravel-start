<?php

namespace Src\Auth\Infrastructure;

use Src\Auth\Interfaces\Infrastructure\IStorage;
use Src\Auth\Interfaces\Infrastructure\IQuery;

class Storage implements IStorage {

    /**
     * @var IQuery
     */
    protected $query;

    public function setQuery(IQuery $query)
    {
        $this->query = $query;
    }

    public function getById(string $id, array $dsl = [])
    {
        return $this->query->select($dsl)->whereId($id)->one();
    }

    public function getByEmail(string $email, array $dsl = [])
    {
        return $this->query->select($dsl)->whereEmail($email)->one();
    }

}