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
                base_path() . '/src/JsonObjects/Laravel/Views',
            ]);
        $this->factory = app()->get(AppServiceProvider::ADMIN_MODULES)->getJsonObjectsFactory();
    }

    public function dir(Request $request)
    {
        $dirId = $request->get('dir-id') ?? '';
        $page = $this->factory->getPagesFactory()->createDirPage($dirId);
        return view('dir', ['page' => $page]);
    }

    public function newDir(Request $request)
    {
        
        $resp = [
            'success' => true,
        ];
        return response()->json($resp);
    }

}