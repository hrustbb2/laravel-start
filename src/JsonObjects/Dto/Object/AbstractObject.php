<?php

namespace Src\JsonObjects\Dto\Object;

abstract class AbstractObject {

    const STRING_TYPE = 'string';
    
    const TEXT_TYPE = 'text';

    const ARRAY_TYPE = 'array';

    const COMPOSITE_TYPE = 'composite';

    protected string $type;

    protected string $description;

    protected array $errors = [];

    public function setDescriptionStr(string $description)
    {
        $this->description = $description;
    }
    
    public function getTitle()
    {
        return $this->description;
    }

    public function appendErrorMessage(string $message)
    {
        $this->errors[] = $message;
    }

    abstract public function getAttributes();

    abstract public function getJson();

    abstract public function loadAttributes(array $attrs);

}