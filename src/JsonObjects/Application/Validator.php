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

    public function renameObject(array $data):bool
    {
        $rules = [
            'id' => [
                'required',
                'max:32',
            ],
            'name' => [
                'required',
                'max:32',
            ],
        ];
        $messages = [

        ];
        return $this->validate($data, $rules, $messages);
    }

    public function deleteObject(array $data):bool
    {
        $rules = [
            'id' => [
                'required',
                'max:32',
            ],
        ];
        $messages = [

        ];
        return $this->validate($data, $rules, $messages);
    }

    public function getCleanData()
    {
        $cleanData = parent::getCleanData();
        if(key_exists('object', $cleanData)){
            $cleanData['object'] = json_encode($cleanData['object']);
        }
        return $cleanData;
    }

}