<?php

namespace Src\Auth\Interfaces\Infrastructure;

use Src\Auth\Interfaces\Infrastructure\IQuery;

interface IStorage {
    public function setQuery(IQuery $query);
    public function getById(string $id, array $dsl = []);
    public function getByEmail(string $email, array $dsl = []);
}