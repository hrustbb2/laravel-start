<?php

namespace Src\Common\Application;

abstract class BaseDomain {

    /**
     * Код ответа в случае внутренней ошибки сервера
     */
    const SERVER_ERROR_CODE = 500;

    /**
     * Код ответа в случае если ресурс не найден
     */
    const NOT_FOUND_CODE = 404;

    /**
     * Ошибка валидации или Unprocessable Entity
     */
    const VALIDATION_FAILED_CODE = 422;

    /**
     * Неавторизованный юзер
     */
    const NOT_AUTHORIZE_CODE = 401;

    /**
     * Все ок
     */
    const OK_CODE = 200;

    /**
     * Сообщения об ошибках
     * @var array
     */
    protected $errors;

    /**
     * @var int код ответа
     */
    protected $responseCode = self::OK_CODE;

    /**
     * Сообщения об ошибках
     * @return array
     */
    public function getErrors()
    {
        return $this->errors;
    }

    public function getResponseCode()
    {
        return $this->responseCode;
    }
}
