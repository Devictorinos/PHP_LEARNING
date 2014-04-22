<?php

namespace PHP_LVL_3;

class User
{
    private $login;
    private $password;

    public function __construct($login, $password)
    {
        $this->login = $login;
        $this->password = $password;
        $this->getUser();
    }

    private function getUser()
    {

    }

    public function __sleep()
    {
        return array('login', 'password');
    }

    public function __wakeup()
    {
        $this->getUser();
    }

    public function __destruct()
    {
        echo " login {$this->login} and his password {$this->password} are removed";
    }
}


$user = new User('viktor', 12345);

$userInfo = serialize($user);
setcookie("UserLogin", $userInfo, 0x7FFFFFFF);

/*echo "<pre>" . print_r($userInfo, true) . "</pre>";*/
?>