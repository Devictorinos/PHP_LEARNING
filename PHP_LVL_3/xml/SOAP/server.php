<?php

function getStock($id)
{
    $stock = array(

        "1" => 100,
        "2" => 200,
        "3" => "454",
        "4" => 400,
        "5" => 500,
        "6" => 600
    );


    if (isset($stock[$id])) {
        
        $quantity = $stock[$id];
        return $quantity;
    } else {

        throw new SoapFault("Server", "Wrong product id!");
    }

}

ini_set('soap.wsdl_cache_enabled', '0');

$server = new SoapServer("http://localhost/php_lerning/PHP_LVL_3/xml/SOAP/stock.wsdl");

$server->addFunction("getStock");

$server->handle();
