<?php
 /**
 *
 *
 *
 *
 */
session_start();
//var_dump($_SERVER);
require_once "autoloader.php";

//use db\DbcClass as DbcClass;
//use register\RegisterClass as RegisterClass;


try {

    $db = new db\DbcClass("localhost", "testDataBase", "root", "123");
  
} catch (Exception $e) {

    echo $e->getMessage();

}


$registerDate = date("d-m-Y G:i:s");
$userIP = $_SERVER['REMOTE_ADDR'];

$IParr = array("userIP" => "{$userIP}");
$regDateArr = array("userRegisterDate" => "{$registerDate}");

$arr = array(
    "userLogin"          => "yffdffyo",
    "userFirstName"      => "fdyfsdfds",
    "userLastName"       => "Ljjjjj",
    "userEmail"          => "aa34@xample.com",
    "userPhoneNumber"    => "057272222",
    "userPassword"       => "123456",
    "userRepeatPassword" => "123456"




    );


$arr = array_merge($arr, $regDateArr, $IParr);


$sta = $db->registerNewUser($arr, true)->runSQL();

if ($sta) {
    echo "user was inserted successful";
} else {

    if (isset($_SESSION['errorLogin'])) {
        echo $_SESSION['errorLogin']."<br>";
        unset($_SESSION['errorLogin']);
    }

    if (isset($_SESSION['errorEmail'])) {
        echo $_SESSION['errorEmail']."<br>";
        unset($_SESSION['errorEmail']);
    }

   
    echo "Error with user data ! check the data";
}




// $ipaddress = getenv('HTTP_CLIENT_IP');

// var_dump($ipaddress);