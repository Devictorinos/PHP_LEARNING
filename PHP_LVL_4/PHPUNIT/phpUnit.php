<?php

require_once "test.php";


class UnitTests extends PHPUnit_Framework_TestCase
{
    public function testCanBeNegated()
    {
        //Arrange
        $test = new Tests(23);

        //Act
        $test->showName();


    }
}