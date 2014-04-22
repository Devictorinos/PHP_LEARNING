<?php

namespace PHP_LVL_3;

trait Hello
{
    public $message;
    private function hello()
    {
        $this->message = "Hello";
        return $this;
    }
}

trait User
{
    public $name;
    public function user($name)
    {
        $this->name = $name;
        return $this;
    }
}


class Welcome
{
    use Hello { hello as public; }
    use User;
   // use User, Hello;

    public function __tostring()
    {
        return $this->message . " " . $this->name;
    }
}

$hello = new Welcome();

echo $hello->hello()->user("Alex");
