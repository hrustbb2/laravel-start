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
use Src\Sidebar\Interfaces\IModulesProvider as ISidebarModulesProvider;
use Src\Sidebar\Interfaces\IFactory as ISidebarFactory;
use Src\Sidebar\Factory as SidebarFactory;
use Src\JsonObjects\Interfaces\IModulesProvider as IJsonObjectsProvider;
use Src\JsonObjects\Interfaces\IFactory as IJsonObjectsFactory;
use Src\JsonObjects\Factory as JsonObjectsFactory;
use Src\Lib\CategoriesTree\Interfaces\IFactory as ITreeCategoriesFactory;
use Src\Lib\CategoriesTree\Factory as TreeCategoriesFactory;

class ModulesProvider implements IFirstModuleProvider, IAuthModulesProvider, ISidebarModulesProvider, IJsonObjectsProvider {

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

    /**
     * @var ISidebarFactory
     */
    protected ?ISidebarFactory $sidebarFactory = null;

    protected ?IJsonObjectsFactory $jsonObjectsFactory = null;

    protected ?ITreeCategoriesFactory $treeCategoriesFactory = null;

    public function getCommonFactory():ICommonFactory
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
                IAuthFactory::SUCCESS_URL => $this->getCommonFactory()->getAdaptersFactory(ICommonFactory::LARAVEL)->getRoute()->getRoute('admin.jsonObjects.dir'),
                IAuthFactory::TABLE_NAME_SETTING => 'users',
                IAuthFactory::FRAMEWORK_NAME => ICommonFactory::LARAVEL,
            ];
            $this->authFactory->loadSettings($settings);
            $this->authFactory->injectModules($this);
        }
        return $this->authFactory;
    }

    public function getSidebarFactory():ISidebarFactory
    {
        if($this->sidebarFactory === null){
            $this->sidebarFactory = new SidebarFactory();
            $settings = [
                ISidebarFactory::FRAMEWORK_NAME => ICommonFactory::LARAVEL,
            ];
            $this->sidebarFactory->loadSettings($settings);
            $this->sidebarFactory->injectModules($this);
        }
        return $this->sidebarFactory;
    }

    public function getJsonObjectsFactory(): IJsonObjectsFactory
    {
        if($this->jsonObjectsFactory === null){
            $this->jsonObjectsFactory = new JsonObjectsFactory();
            $objFactory = $this->getCommonFactory()->getDtoFactory()->getObjectFactory();
            $jsonObjectsSettings = [
                IJsonObjectsFactory::DB_HOST => 'db',
                IJsonObjectsFactory::DB_NAME => 'dbname',
                IJsonObjectsFactory::DB_USER => 'user',
                IJsonObjectsFactory::DB_PASS => 'password',
                IJsonObjectsFactory::DB_CHARSET => 'utf8',
                IJsonObjectsFactory::FRAMEWORK_NAME => ICommonFactory::LARAVEL,
                IJsonObjectsFactory::OBJECTS_TABLE => 'json_objects_table',
                IJsonObjectsFactory::OBJECTS_FACTORY => $objFactory,
                IJsonObjectsFactory::ITEMS_DROPDOWN => [
                    [
                        IJsonObjectsFactory::ITEM_TITLE => 'Example object',
                        IJsonObjectsFactory::ITEM_TYPE => \Src\Common\Dto\Object\ExampleComposit::EXAMPLE_COMPOSIT,
                    ]
                ],
            ];
            $this->jsonObjectsFactory->loadSettings($jsonObjectsSettings);
            $dirsCategoriesFactory = $this->createTreeCategoriesFactory();
            $treeSettings = [
                ITreeCategoriesFactory::DB_HOST => 'db',
                ITreeCategoriesFactory::DB_NAME => 'dbname',
                ITreeCategoriesFactory::DB_USER => 'user',
                ITreeCategoriesFactory::DB_PASS => 'password',
                ITreeCategoriesFactory::DB_CHARSET => 'utf8',
                ITreeCategoriesFactory::FRAMEWORK_NAME => ICommonFactory::LARAVEL,
                ITreeCategoriesFactory::TABLE_NAME => 'json_objects_dirs',
            ];
            $dirsCategoriesFactory->loadSettings($treeSettings);
            $dirsCategoriesFactory->setCommonFactory($this->getCommonFactory());
            $this->jsonObjectsFactory->setDirsTreeFactory($dirsCategoriesFactory);
            $this->jsonObjectsFactory->injectModules($this);
        }
        return $this->jsonObjectsFactory;
    }

    protected function createTreeCategoriesFactory(): ITreeCategoriesFactory
    {
        return new TreeCategoriesFactory();
    }

}