<?php

namespace Src\JsonObjects\Tests\Dto\Object;

use Src\JsonObjects\Dto\Object\AbstractComposite;
use Src\JsonObjects\Dto\Object\StringObject;

class ArrayItemComposite extends AbstractComposite {

    const ARRAY_ITEM_COMPOSIT = 'array-item-composit';

    public function getTitle()
    {
        /** @var StringObject $field */
        $field = $this->fields['name'];
        return $field->getValue() ?? parent::getTitle();
    }

    public function init()
    {
        $this->type = self::ARRAY_ITEM_COMPOSIT;
        $this->description = 'Composite Item';

        $name = $this->fieldsFactory->createObjectField(AbstractComposite::STRING_TYPE);
        $name->setDescriptionStr('name');
        $this->fields['name'] = $name;

        $text = $this->fieldsFactory->createObjectField(AbstractComposite::TEXT_TYPE);
        $text->setDescriptionStr('Text');
        $this->fields['text'] = $text;
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
        if(!$result){
            $this->appendErrorMessage('Error');
        }
        return $result;
    }

}