<?php

namespace Src\JsonObjects\Laravel\Controllers;

use Illuminate\Routing\Controller;
use App\Providers\AppServiceProvider;
use Src\JsonObjects\Interfaces\IFactory as IModuleFactory;
use Illuminate\Support\Facades\View;
use Illuminate\Http\Request;

class DirController extends Controller {

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
        $this->factory = app()->get(AppServiceProvider::ADMIN_MODULES)->getJsonObjectsModule();
    }

    public function dir(Request $request)
    {
        $dirId = $request->get('dir-id') ?? '';
        $page = $this->factory->getPagesFactory()->createDirPage($dirId);
    }

}