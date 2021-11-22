<?php

namespace Src\JsonObjects\Dto\Object;

use Src\JsonObjects\Interfaces\Dto\Object\IFactory as IFieldsFactory;

abstract class AbstractComposite extends AbstractObject {
    
    /**
     * @var AbstractObject[]
     */
    protected array $fields = [];

    protected IFieldsFactory $fieldsFactory;

    public function setFieldsFactory(IFieldsFactory $factory)
    {
        $this->fieldsFactory = $factory;
    }
    
    public function getAttributes()
    {
        $attrs = [];
        foreach($this->fields as $key=>$field){
            /** @var AbstractObject $field */
            $attrs[$key] = $field->getAttributes();
        }
        return $attrs;
    }

    public function getJson()
    {
        $fields = array_map(function(AbstractObject $field){
            return $field->getJson();
        }, $this->fields);
        return [
            'type' => $this->type,
            'fields' => $fields,
            'errors' => $this->errors,
        ];
    }

    public function loadAttributes(array $attrs)
    {
        foreach($attrs as $key=>$attr){
            /** @var AbstractObject $field */
            $field = $this->fields[$key];
            $field->loadAttributes($attr);
        }
    }

    abstract public function init();

}