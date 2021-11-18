<?php

namespace Src\Common\Infrastructure;

use Phinx\Db\Adapter\AdapterFactory;
use Phinx\Db\Table;

abstract class InitDb {

    const MYSQL_DRIVER = 'mysql';

    const PGSQL_DRIVER = 'pgsql';

    const SQLITE_DRIVER = 'sqlite';

    const SQLSRV_DRIVER = 'sqlsrv';

    protected string $driver = self::MYSQL_DRIVER;
    
    protected string $dbHost;

    protected string $dbName;

    protected string $dbPassword;

    protected string $dbUser;

    protected string $dbCharset = 'utf8';

    public function setDriver(string $driver)
    {
        $this->driver = $driver;
    }

    public function setDbHost(string $host)
    {
        $this->dbHost = $host;
    }

    public function setDbName(string $dbName)
    {
        $this->dbName = $dbName;
    }

    public function setDbPassword(string $password)
    {
        $this->dbPassword = $password;
    }

    public function setDbUser(string $user)
    {
        $this->dbUser = $user;
    }

    public function setDbCharset(string $charset)
    {
        $this->dbCharset = $charset;
    }

    protected function getTable(string $tableName, array $tableOptions = [])
    {
        $adapterFactory = AdapterFactory::instance();
        $options = [
            'host' => $this->dbHost,
            'name' => $this->dbName,
            'user' => $this->dbUser, 
            'pass' => $this->dbPassword,
        ];
        $adapter = $adapterFactory->getAdapter($this->driver, $options);
        $adapter->connect();
        return new Table($tableName, $tableOptions, $adapter);
    }

}