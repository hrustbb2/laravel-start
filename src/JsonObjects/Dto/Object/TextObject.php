<?php

namespace Src\JsonObjects\Dto\Object;

class TextObject extends AbstractObject {
    
    protected ?string $value = null;

    protected string $type = self::TEXT_TYPE;

    public function getAttributes()
    {
        return [
            'value' => $this->value ?? '',
        ];
    }

    public function getJson()
    {
        return [
            'type' => $this->type,
            'description' => $this->getTitle(),
            'value' => $this->value,
            'errors' => $this->errors,
        ];
    }

    public function loadAttributes(array $attrs)
    {
        $this->value = $attrs['value'];
    }

    public function getValue()
    {
        return $this->value;
    }

}