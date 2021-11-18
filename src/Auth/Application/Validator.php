<?php

namespace Src\Auth\Application;

use Src\Common\Application\BaseValidator;
use Src\Auth\Interfaces\Application\IValidator;

class Validator extends BaseValidator implements IValidator {

    public function login(array $data)
    {
        $rules = [
            'email' => [
                'required',
                'email',
            ],
            'password' => [
                'required',
            ],
        ];
        $messages = [
            'required' => 'Поле обязательно для заполнения',
            'email' => 'Не корректный емайл',
        ];
        return $this->validate($data, $rules, $messages);
    }

}