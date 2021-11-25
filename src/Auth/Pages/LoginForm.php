<?php

namespace Src\Auth\Pages;

use Src\Auth\Interfaces\Pages\ILoginForm;
use Src\Common\Interfaces\Adapters\IRoute;

class LoginForm implements ILoginForm {

    public IRoute $routeAdapter;

    public function setRouteAdapter(IRoute $adapter)
    {
        $this->routeAdapter = $adapter;
    }

    public function getTitle()
    {
        return 'Вход';
    }

    public function getJsStack()
    {
        return [
            '<script src="/admin-js/auth-login-form.js"></script>',
        ];
    }

    public function getCssStack()
    {
        return [
            '<link rel="stylesheet" href="/admin-css/auth-login-form.css">',
        ];
    }

    public function getJsSettings()
    {
        return [
            'requestUrl' => $this->routeAdapter->getRoute('admin.auth.loginRequest'),
        ];
    }

}