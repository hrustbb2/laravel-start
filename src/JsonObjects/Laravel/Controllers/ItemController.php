<?php

namespace Src\JsonObjects\Laravel\Controllers;

use Illuminate\Routing\Controller;
use App\Providers\AppServiceProvider;
use Src\JsonObjects\Interfaces\IFactory as IModuleFactory;
use Illuminate\Support\Facades\View;
use Illuminate\Http\Request;

class ItemController extends Controller {

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

    public function item(Request $request)
    {
        $itemId = $request->get('item-id') ?? '';
        $page = $this->factory->getPagesFactory()->createItemPage($itemId);
        return view('item', ['page' => $page]);
    }

    public function editItem(Request $request)
    {
        $data = $request->all();
        $domain = $this->factory->getApplicationFactory()->getDomain();
        $resp = [
            'success' => $domain->editObject($data),
            'errors' => $domain->getErrors(),
            'item' => $domain->getItem()->toArray(),
        ];
        return response()->json($resp, $domain->getResponseCode());
    }

}