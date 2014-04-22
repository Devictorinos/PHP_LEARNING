<?php
 /**
 *
 *
 *
 *
 */
session_start();

require_once "autoloader.php";


function mailTo($to, $subj, $userFirstName, $userLastName)
{

        $messageContent = '<!doctype html>
                        <html lang="en">
                        <head>
                            <meta charset="UTF-8" />
                            <title>Landing Magic</title>
                        </head>
                        <body>
                            <div style="">
                                '. $userFirstName . ' ' . $userLastName . '<br />
                                Thank You for registration.<br />
                                Enjoy our Project.
                            </div>
                        </body>
                        </html>';



        $headers  = "MIME-Version: 1.0\r\n";
        $headers .= "Content-Type: text/hml;charset=utf-8\r\n";
        $headers .= "Content-Transfer-Encoding:base64\r\n";
        $headers .= "From: Landing Magic\r\n";
        $headers .= "Replay-To: viktorlubchuk@gmail.com";
        $to       = $to;
        $subject  = '=?UTF-8?B?'.base64_encode(iconv("Windows-1255", "utf-8", $subj)).'?=';
        $msg      = trim(chunk_split(base64_encode(iconv("Windows-1255", "utf-8", $messageContent))));

        mail($to, $subject, $msg, $headers);
}



//use db\DbcClass as DbcClass;
//use register\RegisterClass as RegisterClass;


//trying to connect to data base
try {

    $db = new db\DbcClass("localhost", "testDataBase", "root", "123");
  
} catch (Exception $e) {

    echo $e->getMessage();

}

//Getting registration date
$registerDate = date("d-m-Y G:i:s");

//Getting IP of user
$userIP = $_SERVER['REMOTE_ADDR'];

//Creating array key for insert to db
$IParr = array("userIP" => "{$userIP}");

//Creating array key for insert to db
$regDateArr = array("userRegisterDate" => "{$registerDate}");

/* insert to db array */
$arr = array(
    "userLogin"          => "3erfds",
    "userFirstName"      => "fdyfsdfds",
    "userLastName"       => "Ljjjjj",
    "userEmail"          => "viktorlubchuk@gmail.com",
    "userPhoneNumber"    => "057272222",
    "userPassword"       => "123456",
    "userRepeatPassword" => "123456"




    );

/* adding to array new array keys */
$arr = array_merge($arr, $regDateArr, $IParr);

/* Inserting user data to DB */
$register = $db->registerNewUser($arr, true)->runSQL();


if ($register) {

    mailTo($arr['userEmail'], "Landing Magic Registration", $arr['userFirstName'], $arr['userLastName']);

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
