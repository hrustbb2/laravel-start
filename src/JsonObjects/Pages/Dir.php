<?php

namespace Src\JsonObjects\Pages;

use Src\Common\Pages\Page;
use Src\JsonObjects\Interfaces\Pages\IDir;
use Src\Lib\CategoriesTree\Interfaces\Infrastructure\IStorage as IDirsStorage;
use Src\Lib\CategoriesTree\Interfaces\Dto\IFactory as IDirsDtoFactory;
use Src\Lib\CategoriesTree\Interfaces\Dto\IResource;

class Dir extends Page implements IDir {

    protected IDirsStorage $dirsStorage;

    protected IDirsDtoFactory $dirsDtoFactory;

    /**
     * @var IResource[]
     */
    protected array $dirs = [];

    public function setDirsStorage(IDirsStorage $storage)
    {
        $this->dirsStorage = $storage;
    }

    public function setDirsDtoFactory(IDirsDtoFactory $factory)
    {
        $this->dirsDtoFactory = $factory;
    }
    
    public function init(string $currentDirId)
    {
        $dirsData = $this->dirsStorage->getByParentId($currentDirId);
        foreach($dirsData as $dirData){
            $dir = $this->dirsDtoFactory->createResource();
            $dir->load($dirData);
            $this->dirs[] = $dir;
        }
    }
    
    public function getCssStack()
    {
        return [

        ];
    }

    public function getJsStack()
    {
        return [

        ];
    }

    public function getJsSettings()
    {
        return [

        ];
    }

    public function getTitle()
    {
        return 'JSON Objects';
    }

    public function getBreadcrumbs():array
    {
        return [];
    }

}