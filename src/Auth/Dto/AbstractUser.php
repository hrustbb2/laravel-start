<?php

namespace Src\Auth\Dto;

abstract class AbstractUser {

    protected ?string $id;

    protected ?string $email;

    protected ?string $passwordHash;

    public function getId()
    {
        return $this->id;
    }

    public function load(array $attrs)
    {
        $this->id = $attrs['id'] ?? null;
        $this->email = $attrs['email'] ?? null;
        $this->passwordHash = $attrs['password_hash'] ?? null;
    }

    public function getAttributes()
    {
        return [
            'id' => $this->id,
            'email' => $this->email,
            'password_hash' => $this->passwordHash,
        ];
    }

}