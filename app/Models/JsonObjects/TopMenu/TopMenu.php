<?php

namespace App\Models\JsonObjects\TopMenu;

use App\Models\JsonObjects\Base;
use Src\Common\Dto\Object\AbstractComposite;
use Src\Common\Dto\Object\ObjectsArray;
use Src\Common\Dto\Object\FileObject;

class TopMenu extends Base {

    const TYPE = 'top-menu';

    public function init()
    {
        $this->type = self::TYPE;
        $this->description = 'Top menu';

        $logo = $this->fieldsFactory->createObjectField(AbstractComposite::FILE_TYPE);
        $logo->setDescriptionStr('Logo');
        $this->fields['logo'] = $logo;

        /** @var ObjectsArray $items */
        $items = $this->fieldsFactory->createObjectField(AbstractComposite::ARRAY_TYPE);
        $items->setDescriptionStr('Menu items');
        $items->setItemDescription('Item');
        $items->appendItemsType(TopMenuItem::TYPE, 'Item', 'title');
        $this->fields['items'] = $items;
    }

    public function validate():bool
    {
        $result = true;
        if(!$this->getLogo()){
            $this->fields['logo']->appendErrorMessage('Обязательное поле');
            $result = false;
        }
        foreach($this->getItems() as $item){
            /** @var TopMenuItem $item */
            if(!$item->validate()){
                $result = false;
                $this->appendErrorMessage('error');
            }
        }
        return $result;
    }

    public function getLogo()
    {
        /** @var FileObject $field */
        $field = $this->fields['logo'];
        return $field->getValue();
    }

    public function getItems()
    {
        /** @var ObjectsArray $field */
        $field = $this->fields['items'];
        return $field->getItems();
    }

}