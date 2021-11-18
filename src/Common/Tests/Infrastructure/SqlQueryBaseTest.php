<?php

namespace Src\Common\Tests\Infrastructure;

use Tests\TestCase;

class SqlQueryBaseTest extends TestCase {

    public function testGetSelectSection()
    {
        $query = new Query();
        $selectSection = $query->getSelectSectionTest(['id', 'name'], ['id', 'name'], 'table', 'p_');
        $this->assertEquals($selectSection[0], 'table.id AS p_id');
        $this->assertEquals($selectSection[1], 'table.name AS p_name');
    }

    public function testAddRequiredFields()
    {
        $query = new Query();
        $fields = $query->addRequiredFieldsTest(['name'], ['id']);
        $this->assertTrue(in_array('id', $fields));
    }

    public function testAddRequiredFields2()
    {
        $query = new Query();
        $fields = $query->addRequiredFieldsTest(['*'], ['id']);
        $this->assertTrue(in_array('*', $fields));
        $this->assertFalse(in_array('id', $fields));
    }

}