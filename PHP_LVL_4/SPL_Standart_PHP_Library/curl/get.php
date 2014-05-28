<?php
/**
 * Created by PhpStorm.
 * User: victorino
 * Date: 5/27/14
 * Time: 11:31 PM
 */

$name = $_POST['name'];
$age  = $_POST['age'];

$post = "name=" . $name . "&age=" . $age;
$url = "http://localhost/php_lerning/PHP_LVL_4/SPL_Standart_PHP_Library/curl/curl.php";
$ch = curl_init();
curl_setopt($ch, CURLOPT_URL, $url);
curl_setopt($ch, CURLOPT_POST, 1);
curl_setopt($ch, CURLOPT_POSTFIELDS, "name=" . $name . "&age=" . $age);

curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);

$server_output = curl_exec($ch);

curl_close($ch);


/*if ($server_output == "OK") {
    setcookie("ok" , $name , time() + 600);
} else {
    setcookie("error", "error", time() + 600);
}*/