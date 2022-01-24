<?php

namespace Src\JsonObjects\Interfaces;

use Src\JsonObjects\Interfaces\IModulesProvider;
use Src\Common\Interfaces\IFactory as ICommonFactory;
use Src\Sidebar\Interfaces\IFactory as ISidebarFactory;
use Src\Lib\CategoriesTree\Interfaces\IFactory as IDirsTreeFactory;
use Src\JsonObjects\Interfaces\Dto\IFactory as IDtoFactory;
use Src\JsonObjects\Interfaces\Pages\IFactory as IPagesFactory;
use Src\JsonObjects\Interfaces\Infrastructure\IFactory as IInfrastructureFactory;
use Src\JsonObjects\Interfaces\Application\IFactory as IApplicationFactory;

interface IFactory {
    const FRAMEWORK_NAME = 'framework_name';

    const DB_HOST = 'db_host';

    const DB_NAME = 'db_name';

    const DB_USER = 'db_user';

    const DB_PASS = 'db_pass';

    const DB_CHARSET = 'db_charset';

    const OBJECTS_TABLE = 'objects_table';

    const OBJECTS_FACTORY = 'objects_factory';

    const ITEMS_DROPDOWN = 'items_dropdown';

    const ITEM_TITLE = 'title';

    const ITEM_TYPE = 'type';

    public function injectModules(IModulesProvider $provider);
    public function getSidebarFactory():ISidebarFactory;
    public function getCommonFactory():ICommonFactory;
    public function setDirsTreeFactory(IDirsTreeFactory $factory);
    public function getDirsTreeFactory():IDirsTreeFactory;
    public function loadSettings(array $settings);
    public function getSetting(string $key);
    public function getDtoFactory():IDtoFactory;
    public function getPagesFactory():IPagesFactory;
    public function getInfrastructureFactory():IInfrastructureFactory;
    public function getApplicationFactory():IApplicationFactory;
}