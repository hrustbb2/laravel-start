<?php

namespace Src;

use Src\FirstModule\Interfaces\IModulesProvider as IFirstModuleProvider;
use Src\Common\Interfaces\IFactory as ICommonFactory;
use Src\Common\Factory as CommonFactory;
use Src\FirstModule\Interfaces\IFactory as IFirstModuleFactory;
use Src\FirstModule\Factory as FirstModuleFactory;
use Src\Auth\Interfaces\IModulesProvider as IAuthModulesProvider;
use Src\Auth\Interfaces\IFactory as IAuthFactory;
use Src\Auth\Factory as AuthFactory;

class ModulesProvider implements IFirstModuleProvider, IAuthModulesProvider {

    /**
     * @var ICommonFactory
     */
    protected ?ICommonFactory $commonFactory = null;
    
    /**
     * @var IFirstModuleFactory
     */
    protected ?IFirstModuleFactory $firstModule = null;

    /**
     * @var IAuthFactory
     */
    protected ?IAuthFactory $authFactory = null;

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

    public function getAuthModule()
    {
        if($this->authFactory === null){
            $this->authFactory = new AuthFactory();
            $settings = [
                IAuthFactory::DB_HOST => 'db',
                IAuthFactory::DB_NAME => 'dbname',
                IAuthFactory::DB_USER => 'user',
                IAuthFactory::DB_PASS => 'password',
                IAuthFactory::DB_CHARSET => 'utf8',
                IAuthFactory::TABLE_NAME_SETTING => 'users',
                IAuthFactory::FRAMEWORK_NAME => ICommonFactory::LARAVEL,
            ];
            $this->authFactory->loadSettings($settings);
            $this->authFactory->injectModules($this);
        }
        return $this->authFactory;
    }

}