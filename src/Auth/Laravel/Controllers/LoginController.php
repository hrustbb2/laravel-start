<?php

namespace Src\Auth\Laravel\Controllers;

use Illuminate\Routing\Controller;
use Illuminate\Http\Request;
use App\Providers\AppServiceProvider;
use Src\Auth\Interfaces\IFactory as IModuleFactory;
use Illuminate\Support\Facades\View;

class LoginController extends Controller {

    /**
     * @var IModuleFactory
     */
    private $factory;

    public function __construct()
    {
        View::getFinder()
            ->setPaths([
                base_path() . '/src/Auth/Laravel/Views',
            ]);
        $this->factory = app()->get(AppServiceProvider::ADMIN_MODULES)->getAuthModule();
    }
    
    public function loginForm()
    {
        $page = $this->factory->getPagesFactory()->createLoginForm();
        return view('loginForm', ['page' => $page]);
    }

    public function loginRequest(Request $request)
    {
        $data = $request->all();
        $domain = $this->factory->getApplicationFactory()->getDomain();
        $resp = [
            'success' => $domain->login($data),
            'errors' => $domain->getErrors(),
        ];
        return response()->json($resp, $domain->getResponseCode());
    }

}