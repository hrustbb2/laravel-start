<?php

namespace Src\Auth\Interfaces\Infrastructure;

use Src\Common\Interfaces\Infrastructure\IQueryBase;

interface IQuery extends IQueryBase {
    /**
     * @return $this
     */
    public function select(array $fields = []);

    /**
     * @return $this
     */
    public function whereId(string $id);

    /**
     * @return $this
     */
    public function whereEmail(string $email);
}