<?php

namespace App\Models\JsonObjects;

use Src\Common\Dto\Object\AbstractComposite;
use Src\Common\Dto\Object\AbstractObject;
use Src\Common\Dto\Object\StringObject;
use Src\Common\Dto\Object\TextObject;
use Src\Common\Dto\Object\ImageObject;

class Topic extends Base {

    const TYPE = 'topic';

    public function init()
    {
        $this->type = self::TYPE;
        $this->setDescriptionStr('Topic');

        /** @var ImageObject $img */
        $img = $this->fieldsFactory->createObjectField(AbstractComposite::IMAGE_TYPE);
        $img->setDescriptionStr('Picture');
        $img->setPath('/uploads');
        $img->setAR(1);
        $this->fields['img'] = $img;

        $header = $this->fieldsFactory->createObjectField(AbstractObject::STRING_TYPE);
        $header->setDescriptionStr('Header');
        $this->fields['header'] = $header;

        $text = $this->fieldsFactory->createObjectField(AbstractObject::TEXT_TYPE);
        $text->setDescriptionStr('Text');
        $this->fields['text'] = $text;
    }

    public function validate():bool
    {
        $result = true;
        if(!$this->getHeader()){
            $this->fields['header']->appendErrorMessage('Обязательное поле');
            $result = false;
        }
        if(!$this->getText()){
            $this->fields['text']->appendErrorMessage('Обязательное поле');
            $result = false;
        }
        return $result;
    }

    public function getPicture()
    {
        /** @var ImageObject $field */
        $field = $this->fields['img'];
        return $field->getValue();
    }

    public function getHeader()
    {
        /** @var StringObject $field */
        $field = $this->fields['header'];
        return $field->getValue();
    }

    public function getText()
    {
        /** @var TextObject $field */
        $field = $this->fields['text'];
        return $field->getValue();
    }

}