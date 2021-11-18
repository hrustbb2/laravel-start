<?php

namespace Src\Common\Interfaces\Infrastructure;

interface IQueryBase {
    /**
     * @return array
     */
    public function all();

    /**
     * @return array
     */
    public function one();
}
