<?php

namespace Src\Common;

use Src\Common\Interfaces\IFactory;
use Src\Common\Interfaces\Pages\IFactory as IPagesFactory;
use Src\Common\Pages\Factory as PagesFactory;

class Factory implements IFactory {

    /**
     * @var IPagesFactory
     */
    protected $pagesFactory = null;

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

}