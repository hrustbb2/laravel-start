<?php

namespace App\Models\Pages;

use App\Models\Interfaces\Pages\IHome;
use App\Models\JsonObjects\Header;
use App\Models\JsonObjects\Info;
use App\Models\JsonObjects\SeoOptions;
use App\Models\JsonObjects\TopMenu\TopMenu;
use App\Models\JsonObjects\Topic;
use Src\Common\Interfaces\Dto\Object\IFactory as IJsonObjectsFactory;
use Src\JsonObjects\Interfaces\Infrastructure\IItemStorage;


class Home implements IHome {

    protected SeoOptions $seoOptions;

    protected TopMenu $topMenu;

    protected Header $header;

    protected Info $info;

    protected Topic $topic;

    protected IItemStorage $jsonObjectsStorage;

    protected IJsonObjectsFactory $jsonObjectsFactory;

    public function setJsonObjectsStorage(IItemStorage $storage):void
    {
        $this->jsonObjectsStorage = $storage;
    }

    public function setJsonObjectsFactory(IJsonObjectsFactory $factory):void
    {
        $this->jsonObjectsFactory = $factory;
    }

    public function init():void
    {
        $this->seoOptions = $this->jsonObjectsFactory->createObjectField(SeoOptions::TYPE);
        $data = $this->jsonObjectsStorage->getByKey('seo_options', ['id', 'object']);
        $this->seoOptions->loadAttributes($data);

        $this->topMenu = $this->jsonObjectsFactory->createObjectField(TopMenu::TYPE);
        $data = $this->jsonObjectsStorage->getByKey('top_menu', ['id', 'object']);
        $this->topMenu->loadAttributes($data);

        $this->header = $this->jsonObjectsFactory->createObjectField(Header::TYPE);
        $data = $this->jsonObjectsStorage->getByKey('header', ['id', 'object']);
        $this->header->loadAttributes($data);

        $this->info = $this->jsonObjectsFactory->createObjectField(Info::TYPE);
        $data = $this->jsonObjectsStorage->getByKey('info', ['id', 'object']);
        $this->info->loadAttributes($data);

        $this->topic = $this->jsonObjectsFactory->createObjectField(Topic::TYPE);
        $data = $this->jsonObjectsStorage->getByKey('topic', ['id', 'object']);
        $this->topic->loadAttributes($data);
    }

    public function getSeoOptions():SeoOptions
    {
        return $this->seoOptions;
    }

    public function getTopMenu():TopMenu
    {
        return $this->topMenu;
    }

    public function getHeader():Header
    {
        return $this->header;
    }

    public function getInfo():Info
    {
        return $this->info;
    }

    public function getTopic():Topic
    {
        return $this->topic;
    }

}