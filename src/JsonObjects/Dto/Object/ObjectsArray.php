<?php

namespace Src\JsonObjects\Dto\Object;

use Src\JsonObjects\Interfaces\Dto\Object\IFactory as IFieldsFactory;

class ObjectsArray extends AbstractObject {
    
    protected string $type = self::ARRAY_TYPE;
    
    protected string $itemsType;

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

    public function setItemsType(string $itemsType)
    {
        $this->itemsType = $itemsType;
    }

    public function getAttributes()
    {
        $items = array_map(function(AbstractObject $item){
            return $item->getAttributes();
        }, $this->items);
        return [
            'items' => $items,
        ];
    }

    public function getJson()
    {
        $items = array_map(function(AbstractObject $item){
            $item->setDescriptionStr($this->itemDescription);
            return $item->getJson();
        }, $this->items);
        return [
            'type' => $this->type,
            'items_type' => $this->itemsType,
            'description' => $this->description,
            'items' => $items,
            'errors' => $this->errors,
        ];
    }

    public function loadAttributes(array $attrs)
    {
        foreach($attrs['items'] as $itemAttrs){
            $item = $this->fieldsFactory->createObjectField($this->itemsType);
            $item->loadAttributes($itemAttrs);
            $this->items[] = $item;
        }
    }

    public function getItems()
    {
        return $this->items;
    }

}