<?php

namespace Src\Common;

use Src\Common\Interfaces\IFactory;
use Src\Common\Interfaces\Pages\IFactory as IPagesFactory;
use Src\Common\Pages\Factory as PagesFactory;
use Src\Common\Interfaces\Adapters\IAdaptersFactory;
use Src\Common\Adapters\Factory as Adapters;
use Src\Common\Interfaces\Dto\IFactory as IDtoFactory;
use Src\Common\Dto\Factory as DtoFactory;

class Factory implements IFactory {

    /**
     * @var IPagesFactory
     */
    protected ?IPagesFactory $pagesFactory = null;

    protected ?IAdaptersFactory $adaptersFactory = null;

    protected ?IDtoFactory $dtoFactory = null;

    protected function newPagesFactory()
    {
        return new PagesFactory();
    }

    public function getPagesFactory()
    {
        if($this->pagesFactory === null){
            $this->pagesFactory = $this->newPagesFactory();
        }
        return $this->pagesFactory;
    }

    public function getAdaptersFactory(string $name)
    {
        if($this->adaptersFactory === null){
            $adapters = new Adapters();
            $this->adaptersFactory = $adapters->getAdaptersFactory($name);
        }
        return $this->adaptersFactory;
    }

    public function getDtoFactory()
    {
        if($this->dtoFactory === null){
            $this->dtoFactory = new DtoFactory();
        }
        return $this->dtoFactory;
    }

}