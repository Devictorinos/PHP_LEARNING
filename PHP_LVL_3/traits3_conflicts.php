<?php

namespace PHP_LVL_3;

trait Hello
{
    public $message;
    private function helloUser()
    {
        $this->message = "Hello";
        return $this;
    }
}

trait User
{
    public $name;
    public function helloUser($name)
    {
        $this->name = $name;
        return $this;
    }
}


class Welcome
{

    use Hello, User {

        Hello::helloUser as public word;
        User::helloUser insteadof Hello;
    }

    public function __tostring()
    {
        return $this->message . " " . $this->name;
    }
}

$hello = new Welcome();

echo $hello->word()->helloUser("Alex");
