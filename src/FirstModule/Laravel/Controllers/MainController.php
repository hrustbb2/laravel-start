<?php

namespace Src\FirstModule\Laravel\Controllers;

use Illuminate\Routing\Controller;
use App\Providers\AppServiceProvider;
use Src\FirstModule\Interfaces\IFactory as IModuleFactory;
use Illuminate\Support\Facades\View;

class MainController extends Controller {

    /**
     * @var IModuleFactory
     */
    private $factory;

    public function __construct()
    {
        View::getFinder()
            ->setPaths([
                base_path() . '/src/FirstModule/Laravel/Views',
            ]);
        $this->factory = app()->get(AppServiceProvider::ADMIN_MODULES)->getFirstModule();
    }

    public function main()
    {
        $page = $this->factory->getPagesFactory()->createMainPage();
        return view('main', ['page' => $page]);
    }

}