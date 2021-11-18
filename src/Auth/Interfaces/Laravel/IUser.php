<?php

namespace Src\Auth\Interfaces\Laravel;

use Illuminate\Contracts\Auth\Authenticatable;
use Src\Auth\Interfaces\Dto\IAbstractUser;

interface IUser extends Authenticatable, IAbstractUser {

}