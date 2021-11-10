<?php

namespace Src\FirstModule;

use Src\FirstModule\Interfaces\IFactory;
use Src\FirstModule\Interfaces\IModulesProvider;
use Src\Common\Interfaces\IFactory as ICommonFactory;
use Src\FirstModule\Interfaces\Pages\IFactory as IPagesFactory;
use Src\FirstModule\Pages\Factory as PagesFactory;

class Factory implements IFactory {

    protected ICommonFactory $commonFactory;

    protected ?IPagesFactory $pagesFactory = null;

    public function injectModules(IModulesProvider $provider)
    {
        $this->commonFactory = $provider->getCommonFactory();
    }

    public function getCommonFactory()
    {
        return $this->commonFactory;
    }
    
    public function getPagesFactory()
    {
        if($this->pagesFactory === null){
            $this->pagesFactory = new PagesFactory();
            $this->pagesFactory->setModuleFactory($this);
        }
        return $this->pagesFactory;
    }

}