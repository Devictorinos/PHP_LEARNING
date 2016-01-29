<?php

declare(strict_types=1);

namespace First_Steps;

class Person
{
    public $name = 'Erika';
    public $job  = 'Developer Advocate';
    public static $company = 'DigitalOcean';
    public function getFriends()
    {
       return [
           'erika' => function () {
               return 'Elephpants and Cats';
           },
           'sammy' => function () {
               return 'Sharks and Penguins';
           }
       ];
    }

    public function getFriendsOf($someone)
    {
       return $this->getFriends()[$someone];
    }

    public static function getNewPerson()
    {
       return new Person();
    }
}

header('Content-Type: text/plain');
$person = new Person();
echo "\n" . $person->getFriends()['erika']() . "\n\n";
echo "\n" . $person->getFriendsOf('sammy')() . "\n\n";
$property = [ 'first' => 'name', 'second' => 'info' ];
echo "\nMy name is " . $person->{$property['first']} . "\n\n";// $person->$property['first'] without {} in PHP7 throwing error.