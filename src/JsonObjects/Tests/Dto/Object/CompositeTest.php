<?php

namespace Src\JsonObjects\Tests\Dto\Object;

use Tests\TestCase;

class CompositeTest extends TestCase {

    public function testJson()
    {
        $factory = new ObjectsFactory();
        $exampleComposit = $factory->createObjectField(ExampleComposit::EXAMPLE_COMPOSIT);
        $json = $exampleComposit->getJson();

        $this->assertEquals($json['type'], ExampleComposit::EXAMPLE_COMPOSIT);
        $this->assertTrue(key_exists('name', $json['fields']));
        $this->assertTrue(key_exists('text', $json['fields']));
    }

    public function testLoadAttrs()
    {
        $factory = new ObjectsFactory();
        $exampleComposit = $factory->createObjectField(ExampleComposit::EXAMPLE_COMPOSIT);
        $attrs = [
            'name' => ['value' => 'Name'],
            'text' => ['value' => 'Text'],
        ];
        $exampleComposit->loadAttributes($attrs);
        $json = $exampleComposit->getJson();
        $this->assertEquals('Text', $json['fields']['text']['value']);
        $this->assertEquals('Name', $json['fields']['name']['value']);
    }

    public function testLoadArrayAttr()
    {
        $factory = new ObjectsFactory();
        $exampleComposit = $factory->createObjectField(ExampleComposit::EXAMPLE_COMPOSIT);
        $attrs = [
            'array' => [
                'items' => [
                    ['value' => 'Item_1'],
                    ['value' => 'Item_2'],
                    ['value' => 'Item_3'],
                ]
            ]
        ];
        $exampleComposit->loadAttributes($attrs);
        $json = $exampleComposit->getJson();
        $this->assertEquals(3, count($json['fields']['array']['items']));
        $this->assertEquals('Item_1', $json['fields']['array']['items'][0]['description']);
        $this->assertEquals('Item_2', $json['fields']['array']['items'][1]['description']);
        $this->assertEquals('Item_3', $json['fields']['array']['items'][2]['description']);
    }

    public function testLoadCompositesArray()
    {
        $factory = new ObjectsFactory();
        $exampleComposit = $factory->createObjectField(ExampleComposit::EXAMPLE_COMPOSIT);
        $attrs = [
            'array_composite' => [
                'items' => [
                    [
                        'name' => ['value' => 'Name'],
                        'text' => ['value' => 'Text'],
                    ],
                    [
                        'name' => ['value' => 'Name_2'],
                        'text' => ['value' => 'Text_2'],
                    ],
                ],
            ],
        ];
        $exampleComposit->loadAttributes($attrs);
        $json = $exampleComposit->getJson();
        $this->assertEquals('Name', $json['fields']['array_composite']['items'][0]['fields']['name']['value']);
    }

    public function testValidate()
    {
        $factory = new ObjectsFactory();
        /** @var ExampleComposit $exampleComposit */
        $exampleComposit = $factory->createObjectField(ExampleComposit::EXAMPLE_COMPOSIT);
        $attrs = [
            'name' => ['value' => ''],
            'text' => ['value' => 'Text'],
            'array' => [
                'items' => [
                    ['value' => ''],
                    ['value' => 'Item_2'],
                    ['value' => 'Item_3'],
                ]
            ],
            'array_composite' => [
                'items' => [
                    [
                        'name' => ['value' => ''],
                        'text' => ['value' => 'Text'],
                    ],
                    [
                        'name' => ['value' => 'Name_2'],
                        'text' => ['value' => 'Text_2'],
                    ],
                ],
            ],
        ];
        $exampleComposit->loadAttributes($attrs);
        $isValid = $exampleComposit->validate();
        $json = $exampleComposit->getJson();
        $this->assertFalse($isValid);
        $this->assertEquals('Field is required', $json['fields']['name']['errors'][0]);
        $this->assertEquals('Error', $json['fields']['array']['errors'][0]);
        $this->assertEquals('Field is required', $json['fields']['array']['items'][0]['errors'][0]);
        $this->assertEquals('Error', $json['fields']['array_composite']['errors'][0]);
        $this->assertEquals('Field is required', $json['fields']['array_composite']['items'][0]['fields']['name']['errors'][0]);
    }

}