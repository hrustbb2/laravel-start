<?php

namespace Src\JsonObjects\Application;

use Src\Common\Application\BaseValidator;
use Src\JsonObjects\Interfaces\Application\IValidator;

class Validator extends BaseValidator implements IValidator {

    public function createObject(array $data):bool
    {
        $rules = [
            'dir-id' => [
                'nullable',
                'max:32',
            ],
            'object.type' => [
                'required',
                'max:32',
            ],
            'name' => [
                'required',
                'max:32',
            ],
            'description' => [
                'required',
                'max:32',
            ]
        ];
        $messages = [

        ];
        return $this->validate($data, $rules, $messages);
    }

    public function editObject(array $data):bool
    {
        $rules = [
            'id' => [
                'required',
                'max:32',
            ],
            'key' => [
                'required',
                'max:32',
            ],
            'object' => [
                'required',
                'array',
            ]
        ];
        $messages = [

        ];
        return $this->validate($data, $rules, $messages);
    }

}