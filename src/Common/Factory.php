<?php

namespace Src\Common;

use Src\Common\Interfaces\IFactory;
use Src\Common\Interfaces\Pages\IFactory as IPagesFactory;
use Src\Common\Pages\Factory as PagesFactory;
use Src\Common\Interfaces\Adapters\IAdaptersFactory;
use Src\Common\Adapters\Factory as Adapters;
use Src\Common\Interfaces\Dto\IFactory as IDtoFactory;
use Src\Common\Dto\Factory as DtoFactory;
use Src\Common\Interfaces\Application\IFilesBrowser;
use Src\Common\Application\FilesBrowser;

class Factory implements IFactory {

    /**
     * @var IPagesFactory
     */
    protected ?IPagesFactory $pagesFactory = null;

    protected ?IAdaptersFactory $adaptersFactory = null;

    protected ?IDtoFactory $dtoFactory = null;

    protected ?IFilesBrowser $filesBrowser = null;

    protected function newPagesFactory()
    {
        return new PagesFactory();
    }

    public function getPagesFactory():IPagesFactory
    {
        if($this->pagesFactory === null){
            $this->pagesFactory = $this->newPagesFactory();
        }
        return $this->pagesFactory;
    }

    public function getAdaptersFactory(string $name):IAdaptersFactory
    {
        if($this->adaptersFactory === null){
            $adapters = new Adapters();
            $this->adaptersFactory = $adapters->getAdaptersFactory($name);
        }
        return $this->adaptersFactory;
    }

    public function getDtoFactory():IDtoFactory
    {
        if($this->dtoFactory === null){
            $this->dtoFactory = new DtoFactory();
        }
        return $this->dtoFactory;
    }

    public function getFilesBrowser():IFilesBrowser
    {
        if($this->filesBrowser === null){
            $this->filesBrowser = new FilesBrowser();
        }
        return $this->filesBrowser;
    }

}