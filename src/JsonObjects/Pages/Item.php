<?php

namespace Src\JsonObjects\Pages;

use Src\Common\Pages\Page;
use Src\JsonObjects\Interfaces\Pages\IItem;
use Src\Common\Interfaces\Adapters\IRoute;
use Src\JsonObjects\Interfaces\Infrastructure\IItemStorage;
use Src\JsonObjects\Interfaces\Dto\Item\IFactory as IItemDtoFactory;
use Src\JsonObjects\Interfaces\Dto\Item\IResourceItem;

class Item extends Page implements IItem {

    protected IItemStorage $itemStorage;

    protected IItemDtoFactory $itemDtoFactory;

    protected IResourceItem $item;

    protected IRoute $routeAdapter;

    public function setItemStorage(IItemStorage $storage)
    {
        $this->itemStorage = $storage;
    }

    public function setItemDtoFactory(IItemDtoFactory $factory)
    {
        $this->itemDtoFactory = $factory;
    }

    public function setRouteAdapter(IRoute $adapter):void
    {
        $this->routeAdapter = $adapter;
    }

    public function init(string $itemId)
    {
        $this->item = $this->itemDtoFactory->createResource();
        $dsl = [
            '*',
            'dir' => ['*'],
        ];
        $itemData = $this->itemStorage->getById($itemId, $dsl);
        $this->item->load($itemData);
    }
    
    public function getCssStack():array
    {
        return [
            '<link rel="stylesheet" href="/admin-css/json-objects-item.css?' . self::CSS_VERSION . '">',
        ];
    }

    public function getJsStack():array
    {
        return [
            '<script src="/admin-js/json-objects-item.js?' . self::JS_VERSION . '"></script>',
        ];
    }

    public function getJsSettings():array
    {
        return [
            'item' => $this->item->toArray(),
            'editObjUrl' => $this->routeAdapter->getRoute('admin.jsonObjects.editItem'),
            'successUrl' => $this->routeAdapter->getRoute('admin.jsonObjects.dir', ['dir-id' => $this->item->getDir()->getId()]),
        ];
    }

    public function getTitle():string
    {
        return '';
    }

    public function getBreadcrumbs():array
    {
        return [];
    }

}