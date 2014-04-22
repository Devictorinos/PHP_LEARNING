<?php

$client = new SoapClient('http://localhost/php_lerning/PHP_LVL_3/xml/SOAP/stock.wsdl', array("encoding"=>"utf-8"));

$result = $client->getStock("3");

echo $result;

$result2 = $client->getStock("5");

echo $result2;

/*
try {
    $client = new SoapClient('http://localhost/soap/names.wsdl', array('encoding'=>'UTF-8',"trace" => 1));
       // $result = $client->getNames('victor');
        $client->__getLastResponse();
        
} catch (SoapFault $e) {
    echo $e->getMessage();
}
*/

