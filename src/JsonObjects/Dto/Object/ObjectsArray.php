<?php

namespace Src\JsonObjects\Dto\Object;

use Src\JsonObjects\Interfaces\Dto\Object\IFactory as IFieldsFactory;

class ObjectsArray extends AbstractObject {
    
    protected string $type = self::ARRAY_TYPE;
    
    protected array $itemsTypes = [];

    /**
     * @var AbstractObject[]
     */
    protected array $items = [];

    protected ?string $itemDescription;

    protected IFieldsFactory $fieldsFactory;

    public function setItemDescription(string $description)
    {
        $this->itemDescription = $description;
    }
    
    public function setFieldsFactory(IFieldsFactory $factory)
    {
        $this->fieldsFactory = $factory;
    } 

    public function setItemsTypes(array $itemsTypes)
    {
        $this->itemsTypes = $itemsTypes;
    }

    public function getAttributes()
    {
        $items = array_map(function(AbstractObject $item){
            $attrs = $item->getAttributes();
            $attrs['type'] = $item->getType();
            return $attrs;
        }, $this->items);
        return [
            'items' => $items,
        ];
    }

    public function getJson()
    {
        $items = array_map(function(AbstractObject $item){
            $json = $item->getJson();
            $descriptionStr = (key_exists('value', $json)) ? $json['value'] : $this->itemDescription;
            $item->setDescriptionStr($descriptionStr);
            return $item->getJson();
        }, $this->items);
        $protoTypesJson = array_map(function(string $itemTupe){
            $protoType = $this->fieldsFactory->createObjectField($itemTupe);
            $protoType->setDescriptionStr($this->itemDescription);
            return $protoType->getJson();
        }, $this->itemsTypes);
        return [
            'type' => $this->type,
            'item_proto' => $protoTypesJson,
            'description' => $this->description,
            'items' => $items,
            'errors' => $this->errors,
        ];
    }

    public function loadAttributes(array $attrs)
    {
        $this->items = [];
        foreach($attrs['items'] as $itemAttrs){
            $item = $this->fieldsFactory->createObjectField($itemAttrs['type']);
            $item->loadAttributes($itemAttrs);
            $this->items[] = $item;
        }
    }

    public function getItems()
    {
        return $this->items;
    }

}