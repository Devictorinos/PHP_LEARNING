<?php

declare(strict_types=1);


/* ++++++++++++++++++++++++++++
 * ----------------------------
 * +++++++Scalar Typehinting */

/**
 * @example Scalar type hint has a two modes <-( Weak and Strict )->
 * By default is Weak mode. we can override that by setting strict_types to 1 : @example declare(strict_types=1);
 * @example
 * <-/ PHP four scalar types \->
 * -Boolean
 * -Integer
 * -Float
 * -String
 *
 * <-/ PHP valid data types \->
 * -bool
 * -int
 * -float
 * -atring
 *
 * <-/ No support for aliases \->
 *  -boolean
 *  -integer
 *
 * <-/ No support for types \->
 * -null
 * -void
 * -mixed
 */


function add(int $a, int $b) : int // you can also set to return a FLOAT and also can pass integer value and it will be automaticaly converted to the float
{
    return $a + $b;
}

echo '</*pre*/>';
var_dump([add(5, 7)]);
var_dump([add(5, 7)]);
