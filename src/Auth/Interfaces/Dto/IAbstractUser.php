<?php

namespace Src\Auth\Interfaces\Dto;

interface IAbstractUser {
    public function getId();
    public function load(array $attrs);
    public function getAttributes();
}