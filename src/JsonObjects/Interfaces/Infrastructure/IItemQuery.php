<?php

namespace Src\JsonObjects\Interfaces\Infrastructure;

use Src\Common\Interfaces\Infrastructure\IQueryBase;

interface IItemQuery extends IQueryBase {
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
    public function whereKey(string $key);
    /**
     * @return $this
     */
    public function whereDirId(string $dirId);
}