<?php

class Name
{
    private $_name;

    public function __construct($name)
    {
        $this->_name = $name;
    }

    public function showName()
    {
        echo $this->_name . "<hr />";
    }
}

class Email
{
    private $_email;
    public $me = "victror";
    public function __construct($email)
    {
        $this->_email = $email;
    }

    public function showEmail()
    {
        echo $this->_email . "<hr />";
    }
}

$name = new Name('viktor');
$email = new Email('viktorlubchuk@gmail.com');

$storage = new SplObjectStorage();

$storage->attach($name);
$storage->attach($email);

echo "<pre>" . print_r($storage, true) . "</pre>";

foreach ($storage as $key => $value) {
       if ($storage->contains($email)) {
                   $obj = $storage->current(); // current object
                $assoc_key = $storage->getInfo();  
        }

}


  //var_dump($obj);
  // echo "<hr/>";
    var_dump($assoc_key);
echo "<hr/><br />";
    $obj->showEmail();
    //echo "<hr/>";
