<?php

namespace App\Models\JsonObjects;

use Src\Common\Dto\Object\AbstractComposite;
use Src\Common\Dto\Object\AbstractObject;
use Src\Common\Dto\Object\TextObject;
use Src\Common\Dto\Object\ImageObject;

class Header extends Base {

    const TYPE = 'header';

    public function init()
    {
        $this->type = self::TYPE;
        $this->setDescriptionStr('Header');

        /** @var ImageObject $bg */
        $bg = $this->fieldsFactory->createObjectField(AbstractComposite::IMAGE_TYPE);
        $bg->setDescriptionStr('Background image');
        $bg->setPath('/uploads');
        $bg->setAR(2);
        $this->fields['bg'] = $bg;

        $header = $this->fieldsFactory->createObjectField(AbstractObject::TEXT_TYPE);
        $header->setDescriptionStr('Header');
        $this->fields['header'] = $header;
    }

    public function validate():bool
    {
        $result = true;
        if(!$this->getBackgroundImage()){
            $this->fields['bg']->appendErrorMessage('Обязательное поле');
            $result = false;
        }
        if(!$this->getHeader()){
            $result = false;
            $this->fields['header']->appendErrorMessage('Поле обязательно');
        };
        return $result;
    }

    public function getBackgroundImage()
    {
        /** @var FileObject $field */
        $field = $this->fields['bg'];
        return $field->getValue();
    }

    public function getHeader()
    {
        /** @var TextObject $field */
        $field = $this->fields['header'];
        return $field->getValue();
    }

}