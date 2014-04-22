<?php

 class Matematics
{
    final public function countSum($x, $y)
    {
        echo  "Sum" . ($x + $y) . "<br />";
    }
}

class Algebra extends Matematics
{
}


final class Matematic
{
    public function countSum($x, $y)
    {
        echo  "Sum" . ($x + $y) . "<br />";
    }
}

class Trigo extends Matematic
{
}

$m = new Algebra();
$m->countSum(74,5);

$t = new Trigo();
$t->countSum(77,5);
