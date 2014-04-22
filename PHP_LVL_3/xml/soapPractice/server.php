<?php
/**
 * Created by PhpStorm.
 * User: victorino
 * Date: 4/21/14
 * Time: 12:08 AM
 */

/*    $db = mysqli_connect("localhost", "root", "123", "practiceRPC");
    mysqli_set_charset($db, "utf8");*/

function getFname($num)
{

/*    $options = array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION);
    try {
        $db = new PDO('mysql:host=localhost;dbname=practiceRPC;charset=utf8', "root", "123", $options);

    } catch (Exception $e) {
        echo $e->getMessage();
    }

    $sql = "SELECT `title` FROM courses ";

    $result = $db->prepare($sql);
    $result->execute();
    $res = $result->fetchAll(PDO::FETCH_ASSOC);*/

/*    return json_encode($res);*/

    $name = $num;
    return $name;
}

ini_set('soap.wsdl_cache_enabled', '0');

$server = new SoapServer('http://localhost/php_lerning/PHP_LVL_3/xml/soapPractice/data.wsdl');

$server->addFunction("getName");

$server->handle();
