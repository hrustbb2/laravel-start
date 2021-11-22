<?php

namespace Src\JsonObjects\Tests\Dto\Object;

use Src\JsonObjects\Dto\Object\AbstractComposite;
use Src\JsonObjects\Dto\Object\ObjectsArray;

class ExampleComposit extends AbstractComposite {

    const EXAMPLE_COMPOSIT = 'example-composit';
    
    public function init()
    {
        $this->type = self::EXAMPLE_COMPOSIT;
        $this->description = 'Example';

        $name = $this->fieldsFactory->createObjectField(AbstractComposite::STRING_TYPE);
        $name->setDescriptionStr('name');
        $this->fields['name'] = $name;

        $text = $this->fieldsFactory->createObjectField(AbstractComposite::TEXT_TYPE);
        $text->setDescriptionStr('Text');
        $this->fields['text'] = $text;

        /** @var ObjectsArray $array */
        $array = $this->fieldsFactory->createObjectField(AbstractComposite::ARRAY_TYPE);
        $array->setDescriptionStr('Array');
        $array->setItemDescription('Item str');
        $array->setItemsType(AbstractComposite::STRING_TYPE);
        $this->fields['array'] = $array;

        /** @var ObjectsArray $arrayComposite */
        $arrayComposite = $this->fieldsFactory->createObjectField(AbstractComposite::ARRAY_TYPE);
        $arrayComposite->setDescriptionStr('Array composite');
        $arrayComposite->setItemDescription('Item composite');
        $arrayComposite->setItemsType(ArrayItemComposite::ARRAY_ITEM_COMPOSIT);
        $this->fields['array_composite'] = $arrayComposite;
    }

    public function validate()
    {
        $result = true;
        $nameValue = $this->fields['name']->getValue();
        if(!$nameValue){
            $result = false;
            $this->fields['name']->appendErrorMessage('Field is required');
        }
        $textValue = $this->fields['text']->getValue();
        if(!$textValue){
            $result = false;
            $this->fields['text']->appendErrorMessage('Field is required');
        }
        if(!$this->validateArray()){
            $result = false;
            $this->fields['array']->appendErrorMessage('Error');
        }
        if(!$this->validateArrayComposite()){
            $result = false;
            $this->fields['array_composite']->appendErrorMessage('Error');
        }
        if(!$result){
            $this->appendErrorMessage('Error');
        }
        return $result;
    }

    protected function validateArray()
    {
        $result = true;
        $items = $this->fields['array']->getItems();
        foreach($items as $item){
            if(!$item->getValue()){
                $result = false;
                $item->appendErrorMessage('Field is required');
            }
        }
        return $result;
    }

    protected function validateArrayComposite()
    {
        $result = true;
        $items = $this->fields['array_composite']->getItems();
        foreach($items as $item){
            if(!$item->validate()){
                $result = false;
            }
        }
        return $result;
    }

}