<?php

namespace App\Models\JsonObjects;

use Src\Common\Dto\Object\AbstractObject;
use Src\Common\Dto\Object\StringObject;

class Info extends Base {

    const TYPE = 'info';

    public function init()
    {
        $this->type = self::TYPE;
        $this->setDescriptionStr('Info');

        $learners = $this->fieldsFactory->createObjectField(AbstractObject::STRING_TYPE);
        $learners->setDescriptionStr('Learners');
        $this->fields['learners'] = $learners;

        $graduates = $this->fieldsFactory->createObjectField(AbstractObject::STRING_TYPE);
        $graduates->setDescriptionStr('Graduates');
        $this->fields['graduates'] = $graduates;

        $currentMoney = $this->fieldsFactory->createObjectField(AbstractObject::STRING_TYPE);
        $currentMoney->setDescriptionStr('Current money');
        $this->fields['current_money'] = $currentMoney;
    }

    public function validate()
    {
        $result = true;
        if(!$this->getLearners()){
            $this->fields['learners']->appendErrorMessage('Обязательное поле');
            $result = false;
        }
        if(!$this->getGraduates()){
            $this->fields['graduates']->appendErrorMessage('Обязательное поле');
            $result = false;
        }
        if(!$this->getCurrentMoney()){
            $this->fields['current_money']->appendErrorMessage('Обязательное поле');
            $result = false;
        }
        return $result;
    }

    public function getLearners()
    {
        /** @var StringObject $field */
        $field = $this->fields['learners'];
        return $field->getValue();
    }

    public function getGraduates()
    {
        /** @var StringObject $field */
        $field = $this->fields['graduates'];
        return $field->getValue();
    }

    public function getCurrentMoney()
    {
        /** @var StringObject $field */
        $field = $this->fields['current_money'];
        return $field->getValue();
    }

}