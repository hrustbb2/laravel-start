<?php

namespace Src\JsonObjects\Tests\Dto\Item;

use Tests\TestCase;
use Src\ModulesProvider;
use Src\JsonObjects\Dto\Object\Factory as ObjectsFactory;
use Src\JsonObjects\Dto\Object\ExampleComposit;

class PersistItemTest extends TestCase {

    public function testLoadAttributes()
    {
        $modulesProvider = new ModulesProvider();
        $persistDto = $modulesProvider->getJsonObjectsFactory()->getDtoFactory()->getItemFactory()->createPersist();
        
        $factory = new ObjectsFactory();
        $exampleComposit = $factory->createObjectField(ExampleComposit::EXAMPLE_COMPOSIT);
        $attrs = [
            'name' => ['value' => 'Name'],
            'text' => ['value' => 'Text'],
        ];
        $exampleComposit->loadAttributes($attrs);
        
        $data = [
            'id' => 'qwe',
            'key' => 'qwe',
            'name' => 'qwe',
            'description' => 'qwe',
            'object' => $exampleComposit->getAttributes(),
        ];
        $persistDto->load($data);

        $r = $persistDto->getAttributes();
        $this->assertEquals('Text', $r['object']['text']['value']);
    }

}