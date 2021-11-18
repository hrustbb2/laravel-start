<?php

namespace Src\Auth\Laravel;

use Src\Auth\Dto\AbstractUser;
use Src\Auth\Interfaces\Laravel\IUser;

class User extends AbstractUser implements IUser {

    public function getAuthIdentifierName()
    {
        return 'id';
    }

    public function getAuthIdentifier()
    {
        return $this->id;
    }

    public function getAuthPassword()
    {
        return $this->passwordHash;
    }

    public function getRememberToken()
    {

    }

    public function setRememberToken($value)
    {

    }

    public function getRememberTokenName()
    {

    }

}