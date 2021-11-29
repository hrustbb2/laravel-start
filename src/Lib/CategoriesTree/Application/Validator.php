<?php

namespace Src\Lib\CategoriesTree\Application;

use Src\Common\Application\BaseValidator;
use Src\Lib\CategoriesTree\Interfaces\Application\IValidator;

class Validator extends BaseValidator implements IValidator {

    public function createDir(array $data):bool
    {
        $rules = [
            'parent-dir' => [
                'max:36',
                'required',
            ],
            'name' => [
                'max:36',
                'required',
            ],
        ];
        $messages = [
            'max' => 'Слишком длинная строка',
            'required' => 'Обязательное поле',
        ];
        return $this->validate($data, $rules, $messages);
    }

}