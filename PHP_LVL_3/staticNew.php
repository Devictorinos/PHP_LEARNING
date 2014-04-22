<?php

class Help
{
    public static function foo()
    {
        echo "current method is " . __METHOD__ . "<br />";
    }
}

$class  = "Help";
$method = "foo";
$class::$method();


class CountUSers
{
    public static $users = null;
    public static $superUsers = null;

    public static function showCountUsers()
    {
        if (self::$users == 8 || self::$superUsers == 8) {
            self::$users = 0;
            self::$superUsers = 0;
            echo "Users objects count limit override an now count is -  Users = " . self::$users . " and Super Users = ".self::$superUsers."<br />";
        } else {
            echo "Users objects count is " . self::$users . "<br />";
            echo "Super Users objects count is " . self::$superUsers . "<br />";
        }
    }
}


class User extends CountUSers
{
    public function __construct()
    {
        ++parent::$users;
    }
}


class SUser extends CountUSers
{
    public function __construct()
    {
        ++parent::$superUsers;
    }
}


$user1 = new User;
$user2 = new User;
$SUser1 = new SUser;
$SUser2 = new SUser;
$SUser3 = new SUser;


CountUSers::showCountUsers();

$user3 = new User;
$user4 = new User;
$SUse4 = new SUser;
$SUse5 = new SUser;

CountUSers::showCountUsers();


class A
{
    public static function whoAmI()
    {
        echo __CLASS__;
    }

    public static function identify()
    {
        static::whoAmI();
    }
}


class B extends A
{
    public static function whoAmI()
    {
        echo __CLASS__;
    }
}

B::identify();