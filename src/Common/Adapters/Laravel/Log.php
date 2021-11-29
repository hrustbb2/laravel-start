<?php

namespace Src\Common\Adapters\Laravel;

use Illuminate\Support\Facades\Log as LogFacade;

class Log {

    public function alert(string $message, array $context = [])
    {
        LogFacade::alert($message, $context);
    }

    public function critical(string $message, array $context = [])
    {
        LogFacade::critical($message, $context);
    }

    public function debug(string $message, array $context = [])
    {
        LogFacade::debug($message, $context);
    }

    public function emergency(string $message, array $context = [])
    {
        LogFacade::emergency($message, $context);
    }

    public function error(string $message, array $context = [])
    {
        LogFacade::error($message, $context);
    }

}