<?php

namespace PHP_LVL_3;

use Exception;

class Person
{
    private $_users = array();
    private $_age   = array();

    public function __set($field, $value)
    {
        switch ($field) {
            case 'name':
                $this->_users[$field][] = $value;
                break;
            case 'age':
                $this->_age[$field][] = $value;
                break;
            default:
                throw new Exception("Error: field not exists");
                break;
        }
        
        
    }

    public function __get($field)
    {
        switch ($field) {
            case 'name':
                return $this->_users;
                break;
            case 'age':
                return $this->_age;
                break;
            default:
                throw new Exception("Error");
                break;
        }
    }

    public function __call($methd, $args)
    {
        echo $methd . "and args is" . implode(",", $args);
    }
}

$person = new Person();
$person->name = "Victor";
$person->name = "Sergey";
$person->age = 29;
$person->age = 26;
//$person->weight = 86;

$person->getInfo(1, 2, 3, 4, 5, 6, 7, 8, 9);

echo "<pre>" . print_r($person->age, true) . "</pre>";
echo "<pre>" . print_r($person->name, true) . "</pre>";
