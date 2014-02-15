<?php

$name = array("viktor", "yosef", "alex", "tom");

$names = serialize($name);

setcookie('name', $names, time() + 5000, 'http://localhost/php_lerning/PHP_LVL_2/cookie/');


if (isset($_COOKIE['name'])) {

    $namess = unserialize($_COOKIE['name']);
    echo "<pre>";
    print_r($namess);
    echo "</pre>";
} else {
    echo 'cookie not exists';
}

