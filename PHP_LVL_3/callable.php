<?php

namespace PHP_LVL_3;

class User
{
    private $_name = "Viktor";
    private $_lname = "Lubchuk";

    public function showName($name, $lname)
    {
        echo "hello " . $name . " " . $lname;
    }

    public static function hello()
    {
        echo "hello ";
    }
}


class Info
{

    public function info(callable $callback, $data, $data2)
    {
        call_user_func($callback, $data, $data2);
        //return $callback();
    }
}

$user = new User();
$info = new Info();

$info->info([$user, 'showName'], "Victor", "Lubchuk");
