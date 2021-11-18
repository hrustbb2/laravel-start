<?php

namespace Src\Common\Tests\Infrastructure;

use Src\Common\Infrastructure\SqlQueryBase;

class Query extends SqlQueryBase {

    public function getSelectSectionTest(array $fields, array $allowFields, string $table, string $prefix)
    {
        return parent::getSelectSection($fields, $allowFields, $table, $prefix);
    }

    public function addRequiredFieldsTest(array $fields, array $requiredFields)
    {
        return parent::addRequiredFields($fields, $requiredFields);
    }

}