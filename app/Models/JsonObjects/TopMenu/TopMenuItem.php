<?php

namespace App\Models\JsonObjects\TopMenu;

use Src\Common\Dto\Object\AbstractComposite;
use Src\Common\Dto\Object\StringObject;

class TopMenuItem extends AbstractComposite {

    const TYPE = 'top_menu_item';

    public function init()
    {
        $this->type = self::TYPE;
        $this->description = 'Top menu item';

        $title = $this->fieldsFactory->createObjectField(AbstractComposite::STRING_TYPE);
        $title->setDescriptionStr('title');
        $this->fields['title'] = $title;

        $href = $this->fieldsFactory->createObjectField(AbstractComposite::STRING_TYPE);
        $href->setDescriptionStr('href');
        $this->fields['href'] = $href;
    }

    public function validate()
    {
        $result = true;
        if(!$this->getItemTitle()){
            $this->fields['title']->appendErrorMessage('Обязательное поле');
            $result = false;
        }
        if(!$this->getHref()){
            $this->fields['href']->appendErrorMessage('Обязательное поле');
            $result = false;
        }
        return $result;
    }

    public function getItemTitle()
    {
        /** @var StringObject $field */
        $field = $this->fields['title'];
        return $field->getValue();
    }

    public function getHref()
    {
        /** @var StringObject $field */
        $field = $this->fields['href'];
        return $field->getValue();
    }

}