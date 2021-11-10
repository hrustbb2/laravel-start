<?php

namespace Src;

use Src\FirstModule\Interfaces\IModulesProvider as IFirstModuleProvider;
use Src\Common\Interfaces\IFactory as ICommonFactory;
use Src\Common\Factory as CommonFactory;
use Src\FirstModule\Interfaces\IFactory as IFirstModuleFactory;
use Src\FirstModule\Factory as FirstModuleFactory;

class ModulesProvider implements IFirstModuleProvider {

    /**
     * @var ICommonFactory
     */
    protected ?ICommonFactory $commonFactory = null;
    
    /**
     * @var IFirstModuleFactory
     */
    protected ?IFirstModuleFactory $firstModule = null;

    public function getCommonFactory()
    {
        if($this->commonFactory === null){
            $this->commonFactory = new CommonFactory();
        }
        return $this->commonFactory;
    }

    public function getFirstModule()
    {
        if($this->firstModule === null){
            $this->firstModule = new FirstModuleFactory();
            $this->firstModule->injectModules($this);
        }
        return $this->firstModule;
    }

}