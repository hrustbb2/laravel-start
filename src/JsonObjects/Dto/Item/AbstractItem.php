<?php

namespace Src\JsonObjects\Dto\Item;

abstract class AbstractItem {

    protected string $id;

    protected string $key;

    protected string $name;

    protected string $description;

    public function getId()
    {
        return $this->id;
    }

    public function getAttributes()
    {
        return [
            'id' => $this->id,
            'key' => $this->key,
            'name' => $this->name,
            'description' => $this->description,
        ];
    }

    public function load(array $data)
    {
        $this->id = $data['id'] ?? null;
        $this->key = $data['key'] ?? null;
        $this->name = $data['name'] ?? null;
        $this->description = $data['description'] ?? null;
    }

}