<?php

namespace Src\Auth\Application;

use Src\Auth\Interfaces\Application\IDomain;
use Src\Auth\Interfaces\Application\IValidator;
use Src\Common\Application\BaseDomain;
use Src\Common\Interfaces\Adapters\IAuth as IAuthAdapter;

class Domain extends BaseDomain implements IDomain {

    protected IValidator $validator;

    protected IAuthAdapter $authAdapter;

    public function setValidator(IValidator $validator)
    {
        $this->validator = $validator;
    }

    public function setAuthAdapter(IAuthAdapter $adapter)
    {
        $this->authAdapter = $adapter;
    }

    public function login(array $data)
    {
        if($this->validator->login($data)){
            $cleanData = $this->validator->getCleanData();
            if($this->authAdapter->attempt($cleanData)){
                return true;
            }else{
                $this->responseCode = self::NOT_AUTHORIZE_CODE;
                $this->errors = array_merge_recursive($this->errors, ['mail' => ['Неверный пароль']]);
                return false;
            }
        }else{
            $this->errors = $this->validator->getErrors();
            $this->responseCode = self::VALIDATION_FAILED_CODE;
            return false;
        }
    }

}