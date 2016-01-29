<?php

declare(strict_types=1);

function setBool(bool $age)
{
    echo '<pre>';
    var_dump($age);
}

function setInt(int $age)
{
    echo '<pre>';
    var_dump($age);
}

function setArr(array $age)
{
    echo '<pre>';
    var_dump($age);
}

function setStr(string $age)
{
    echo '<pre>';
    var_dump($age);
}

function setCallable(callable $age)
{
    echo '<pre>';
    var_dump($age);
}

//setBool(7);
//setInt(7);
//setArr('7');
//setCallable(7);
setStr(7);