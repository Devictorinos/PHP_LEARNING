<?php
    
namespace PHP_LVL_3;

abstract class User
{
    abstract protected function userName($name);
}

interface Lastname
{
    public function lastName($lastName);
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

/*$victor->userName("viktor");
$victor->lastName("lubchuk");*/


class Receiver
{
    public function receiv(Newuser $obj)
    {
        if ($obj instanceof User) {
            echo "instance of USER  <hr />";
        } else {
            echo "not instance of USER <hr />";
        }
    }
}


$res = new \PHP_LVL_3\Receiver();
$res->receiv($victor);

if ($res instanceof User) {
    echo "instance of USER  <hr />";
} else {
    echo "not instance of USER <hr />";
}