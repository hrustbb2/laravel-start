<?php

namespace Src\Auth\Laravel;

use Src\Auth\Interfaces\Laravel\IUserProvider;
use Src\Auth\Interfaces\Laravel\IFactory;
use Illuminate\Contracts\Auth\Authenticatable;
use Src\Auth\Interfaces\Infrastructure\IStorage as IUserStorage;
use Illuminate\Support\Facades\Hash;

class UserProvider implements IUserProvider {

    /**
     * @var IUserStorage
     */
    protected $userStorage;

    /**
     * @var IFactory
     */
    protected $factory;

    public function setUserStorage(IUserStorage $storage)
    {
        $this->userStorage = $storage;
    }

    public function setFactory(IFactory $factory)
    {
        $this->factory = $factory;
    }
    
    public function retrieveById($identifier)
    {
        $userData = $this->userStorage->getById($identifier);
        if($userData){
            $user = $this->factory->createUser();
            $user->load($userData);
            return $user;
        }
        return null;
    }

    public function retrieveByToken($identifier, $token)
    {

    }

    public function updateRememberToken(Authenticatable $user, $token)
    {

    }

    public function retrieveByCredentials(array $credentials)
    {
        $email = $credentials['email'];
        $userData = $this->userStorage->getByEmail($email);
        if($userData){
            $user = $this->factory->createUser();
            $user->load($userData);
            return $user;
        }
        return null;
    }

    public function validateCredentials(Authenticatable $user, array $credentials)
    {
        $passwordHash = $user->getAuthPassword();
        $password = $credentials['password'];
        return Hash::check($password, $passwordHash);
    }

}