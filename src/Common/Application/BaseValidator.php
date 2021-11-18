<?php

namespace Src\Common\Application;

use Illuminate\Support\Facades\Validator as FacadeValidator;

abstract class BaseValidator {

    /**
     * Сообщения об ошибках валидации
     * @var array
     */
    protected array $errors = [];

    /**
     * Проверенные и очищенные данные
     * @var array
     */
    protected array $cleanData = [];

    /**
     * Возвращает ошибки валидации
     * @return array
     */
    public function getErrors()
    {
        return $this->errors;
    }

    /**
     * Возвращает проверенные и очищенные данные
     * @return array
     */
    public function getCleanData()
    {
        return $this->cleanData;
    }

    protected function validate(array $data, array $rules, array $messages)
    {
        $validator = FacadeValidator::make($data, $rules, $messages);
        if($validator->fails()){
            $this->errors = $validator->errors()->toArray();
            return false;
        }
        $this->cleanData = $validator->validated();
        return true;
    }

}
