<?php

function getNames($num)
{
    $names = array(
        "1" => "victor",
        "2" => "Sergey"
        );

    $name = $names[$num];
    return $name;
}

ini_set('soap.wsdl_cache_enabled', '0');

$server = new SoapServer("http://localhost/soap/names.wsdl");

$server->addFunction("getNames");

$server->handle();