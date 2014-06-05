<?php

abstract class Car
{
    private $_document;

    abstract public function getMaxSpeed();
    abstract public function getWeight();
}

class CarFactory
{

    public function createBrand($brand = "")
    {
        $car_obj = null;

        switch ($brand) {
            case 'Toyota':
                $car_obj = new Toyota();
                break;
            case 'Opel':
                $car_obj = new Opel();
                break;
            case 'Mazda':
                $car_obj = new Mazda();
                break;
            default:
                $car_obj = new Mitsubishi();
                break;
        }
    }
}

class Toyota
{

}

class Opel
{
    
}

class Mitsubishi
{
    
}

class Mazda
{
    
}
