<?php

declare(strict_types=1);


/* ++++++++++++++++++++++++++++
 * ----------------------------
 * +++++++Scalar Parameters */

//Types checking of params depends on calling functions file
//Returned values will be cast to the speccified type

function addIntegers(int $a, int $b) : int
{
    return $a + $b;
}

function addFloats(float $a, float $b) : float
{
    return $a + $b;
}

function upperRev(string $str) : string
{
    return strtoupper(strev($str));
}

function isItTrue(bool $bool) : bool
{
    return $bool ? 'true' : 'false';
}
