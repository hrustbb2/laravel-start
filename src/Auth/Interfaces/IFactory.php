<?php

namespace Src\Auth\Interfaces;

use Src\Common\Interfaces\IFactory as ICommonFactory;
use Src\Auth\Interfaces\Laravel\IFactory as ILaravelFactory;
use Src\Auth\Interfaces\IModulesProvider;
use Src\Auth\Interfaces\Infrastructure\IFactory as IInfrastructureFactory;
use Src\Auth\Interfaces\Dto\IFactory as IDtoFactory;
use Src\Auth\Interfaces\Pages\IFactory as IPagesFactory;
use Src\Auth\Interfaces\Application\IFactory as IApplicationFactory;

interface IFactory {
    
    const FRAMEWORK_NAME = 'framework_name';

    const DB_HOST = 'db_host';

    const DB_NAME = 'db_name';

    const DB_USER = 'db_user';

    const DB_PASS = 'db_pass';

    const DB_CHARSET = 'db_charset';
    
    const TABLE_NAME_SETTING = 'table_name';

    public function injectModules(IModulesProvider $provider);
    
    public function loadSettings(array $settings);

    public function getSetting(string $settingName);

    /**
     * @return ICommonFactory
     */
    public function getCommonFactory();

    /**
     * @return ILaravelFactory
     */
    public function getLaravelFactory();
    
    /**
     * @return IInfrastructureFactory
     */
    public function getInfrastructureFactory();

    /**
     * @return IDtoFactory
     */
    public function getDtoFactory();

    /**
     * @return IPagesFactory
     */
    public function getPagesFactory();

    /**
     * @return IApplicationFactory
     */
    public function getApplicationFactory();
}