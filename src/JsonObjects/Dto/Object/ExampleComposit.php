<?php

namespace Src\JsonObjects\Dto\Object;

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

        $object = $this->fieldsFactory->createObjectField(NestedComposite::NESTED_COMPOSIT);
        $object->setDescriptionStr('Object');
        $this->fields['obj'] = $object;

        /** @var ObjectsArray $array */
        $array = $this->fieldsFactory->createObjectField(AbstractComposite::ARRAY_TYPE);
        $array->setDescriptionStr('Array');
        $array->setItemDescription('Item str');
        $array->setItemsType(AbstractComposite::STRING_TYPE);
        $this->fields['array'] = $array;

        /** @var ObjectsArray $arrayObj */
        $arrayObj = $this->fieldsFactory->createObjectField(AbstractComposite::ARRAY_TYPE);
        $arrayObj->setDescriptionStr('Array obj');
        $arrayObj->setItemDescription('Obj');
        $arrayObj->setItemsType(NestedComposite::NESTED_COMPOSIT);
        $this->fields['array_obj'] = $arrayObj;
    }

}