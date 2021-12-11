<?php

namespace Src\JsonObjects\Tests\Application;

use Tests\TestCase;
use Src\ModulesProvider;

class DomainTest extends TestCase {

    public function testCreateObject()
    {
        $modulesProvider = new ModulesProvider();
        $domain = $modulesProvider->getJsonObjectsFactory()->getApplicationFactory()->getDomain();
        $data = [
            'dir-id' => '',
            'object' => [
                'type' => \Src\JsonObjects\Dto\Object\ExampleComposit::EXAMPLE_COMPOSIT,
            ],
            'name' => 'name',
            'description' => 'description',
        ];
        $r = $domain->createObject($data);
        $this->assertTrue($r);
    }

}