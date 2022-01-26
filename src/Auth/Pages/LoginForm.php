<?php

namespace Src\Auth\Pages;

use Src\Auth\Interfaces\Pages\ILoginForm;
use Src\Common\Interfaces\Adapters\IRoute;

class LoginForm implements ILoginForm {

    public IRoute $routeAdapter;

    protected string $successUrl;

    public function setRouteAdapter(IRoute $adapter):void
    {
        $this->routeAdapter = $adapter;
    }

    public function setSuccessUrl(string $url):void
    {
        $this->successUrl = $url;
    }

    public function getTitle():string
    {
        return 'Вход';
    }

    public function getJsStack():array
    {
        return [
            '<script src="/admin-js/auth-login-form.js"></script>',
        ];
    }

    public function getCssStack():array
    {
        return [
            '<link rel="stylesheet" href="/admin-css/auth-login-form.css">',
        ];
    }

    public function getJsSettings():array
    {
        return [
            'requestUrl' => $this->routeAdapter->getRoute('admin.auth.loginRequest'),
            'successUrl' => $this->successUrl,
        ];
    }

}