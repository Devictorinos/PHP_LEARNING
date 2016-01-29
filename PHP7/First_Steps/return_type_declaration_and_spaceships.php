<?php

declare(strict_types=1);

class User {

    public $name;
    public $age;

    public function __construct(string $name, int $age)
    {
        $this->name = $name;
        $this->age  = $age;

        return $this;
    }
}

class UserCollection
{
    protected $users;

    public function __construct(array $users)
    {
        $this->users = $users;
    }

    public function sortBy($property)
    {
        usort($this->users, function($userOne, $userTwo) use ($property) {
echo '<pre>' . print_r($userOne->$property <=> $userTwo->$property, true) . '</pre>';
            return $userOne->$property <=> $userTwo->$property;
        });
    }

    public function users()
    {
        return $this->users;
    }

}

interface MyInterface
{
    public function getUser() : User;
}

class MyClass implements MyInterface
{
    public function getUser() : User
    {
        return new User;
    }
}

function getUser($user = '') : User
{
    return new User;
}


$collection = new UserCollection([

        new User('Victor', 10),
        new User('Rita', 29),
        new User('John', 49),
        new User('Roni', 26),
        new User('Alex', 20)
    ]);

$collection->sortBy('name');
echo '<pre>';
var_dump($collection->users());
