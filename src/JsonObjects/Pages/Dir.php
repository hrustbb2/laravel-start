<?php

namespace Src\JsonObjects\Pages;

use Src\Common\Pages\Page;
use Src\Common\Interfaces\Adapters\IRoute;
use Src\JsonObjects\Interfaces\Pages\IDir;
use Src\Lib\CategoriesTree\Interfaces\Infrastructure\IStorage as IDirsStorage;
use Src\Lib\CategoriesTree\Interfaces\Dto\IFactory as IDirsDtoFactory;
use Src\Lib\CategoriesTree\Interfaces\Dto\IResource as IDirResource;

class Dir extends Page implements IDir {

    protected IDirsStorage $dirsStorage;

    protected IDirsDtoFactory $dirsDtoFactory;

    protected IRoute $routeAdapter;

    /**
     * @var IDirResource[]
     */
    protected array $dirs = [];

    protected IDirResource $currentDir;

    public function setDirsStorage(IDirsStorage $storage)
    {
        $this->dirsStorage = $storage;
    }

    public function setDirsDtoFactory(IDirsDtoFactory $factory)
    {
        $this->dirsDtoFactory = $factory;
    }

    public function setRouteAdapter(IRoute $adapter)
    {
        $this->routeAdapter = $adapter;
    }
    
    public function init(string $currentDirId)
    {
        $this->currentDir = $this->dirsDtoFactory->createResource();
        $currentDirData = $this->dirsStorage->getById($currentDirId);
        $this->currentDir->load($currentDirData);
        $dirsData = $this->dirsStorage->getByParentId($currentDirId);
        foreach($dirsData as $dirData){
            $dir = $this->dirsDtoFactory->createResource();
            $dir->load($dirData);
            $this->dirs[$dir->getId()] = $dir;
        }
    }
    
    public function getCssStack()
    {
        return [
            '<link rel="stylesheet" href="/admin-css/json-objects-dir.css?' . self::CSS_VERSION . '">',
        ];
    }

    public function getJsStack()
    {
        return [
            '<script src="/admin-js/json-objects-dir.js?' . self::JS_VERSION . '"></script>',
        ];
    }

    public function getJsSettings()
    {
        $dirs = array_map(function(IDirResource $dir){
            return $dir->toArray();
        }, $this->dirs);
        return [
            'currentId' => $this->currentDir->getId(),
            'dirs' => $dirs,
            'url' => $this->routeAdapter->getRoute('admin.jsonObjects.dir'),
            'newDirUrl' => $this->routeAdapter->getRoute('admin.jsonObjects.newDir'),
            'renameDirUrl' => $this->routeAdapter->getRoute('admin.jsonObjects.renameDir'),
            'deleteDirUrl' => $this->routeAdapter->getRoute('admin.jsonObjects.deleteDir'),
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