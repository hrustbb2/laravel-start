<?php

namespace App\Models\JsonObjects;

use Src\Common\Dto\Object\AbstractComposite;
use Src\Common\Dto\Object\AbstractObject;
use Src\Common\Dto\Object\TextObject;

class Header extends AbstractComposite {

    const TYPE = 'header';

    public function init()
    {
        $this->type = self::TYPE;
        $this->setDescriptionStr('Header');

        $header = $this->fieldsFactory->createObjectField(AbstractObject::TEXT_TYPE);
        $header->setDescriptionStr('Header');
        $this->fields['header'] = $header;
    }

    public function validate()
    {
        $result = true;
        if(!$this->getHeader()){
            $result = true;
            $this->fields['header']->appendErrorMessage('Поле обязательно');
        };
        return $result;
    }

    public function getHeader()
    {
        /** @var TextObject $field */
        $field = $this->fields['header'];
        return $field->getValue();
    }

}