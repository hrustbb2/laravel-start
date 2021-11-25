<?php

namespace Src\JsonObjects\Interfaces;

use Src\JsonObjects\Interfaces\IModulesProvider;
use Src\Common\Interfaces\IFactory as ICommonFactory;
use Src\Sidebar\Interfaces\IFactory as ISidebarFactory;
use Src\Lib\CategoriesTree\Interfaces\IFactory as IDirsTreeFactory;
use Src\JsonObjects\Interfaces\Dto\IFactory as IDtoFactory;
use Src\JsonObjects\Interfaces\Pages\IFactory as IPagesFactory;
use Src\JsonObjects\Interfaces\Infrastructure\IFactory as IInfrastructureFactory;

interface IFactory {
    const FRAMEWORK_NAME = 'framework_name';

    const DB_HOST = 'db_host';

    const DB_NAME = 'db_name';

    const DB_USER = 'db_user';

    const DB_PASS = 'db_pass';

    const DB_CHARSET = 'db_charset';

    const OBJECTS_TABLE = 'objects_table';

    public function injectModules(IModulesProvider $provider);
    public function getSidebarFactory():ISidebarFactory;
    public function getCommonFactory():ICommonFactory;
    public function setDirsCategoriesFactory(IDirsTreeFactory $factory);
    public function getDirsCategoriesFactory():IDirsTreeFactory;
    public function loadSettings(array $settings);
    public function getSetting(string $key);
    public function getDtoFactory():IDtoFactory;
    public function getPagesFactory():IPagesFactory;
    public function getInfrastructureFactory():IInfrastructureFactory;
}