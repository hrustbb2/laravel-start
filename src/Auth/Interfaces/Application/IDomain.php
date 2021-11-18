<?php

namespace Src\Auth\Interfaces\Application;

use Src\Common\Interfaces\Application\IBaseDomain;
use Src\Common\Interfaces\Adapters\IAuth as IAuthAdapter;

interface IDomain extends IBaseDomain {
    public function setValidator(IValidator $validator);
    public function setAuthAdapter(IAuthAdapter $adapter);
    public function login(array $data);
}