<?php

namespace PHP_LVL_3;

abstract class User
{
    abstract protected function userName($name);
}

interface Lastname
{
    public function lastName();
}



class Newuser extends User implements Lastname
{
    public function userName($name)
    {
        echo $name;
    }

    public function lastName($lastname)
    {
        echo "<br />" . $lastname;
    }
}

$victor = new \PHP_LVL_3\NewUser();

$victor->userName("viktor");
$victor->lastName("lubchuk");
