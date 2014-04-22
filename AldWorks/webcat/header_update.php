<?php

require_once "php/db_connect.php";//Data Base Connect
require_once "php/functions.php";//Functions

//Arrays to replace 
$current = array("'",'"',"`");
$replace = array("&#39;","&#34;","&#96;");



$phone = $_POST['phone'];

$fax = $_POST['fax'];




$address = str_replace($current, $replace, $_POST['address']);


$result = update_header($phone, $fax, $address);
if (!$result) {
    $_SESSION['update_header_error'] = '!!!בעיה עם עדכון של הנתונים';
    header('location: custum_header.php');
    die();
} else {
    $_SESSION['update_header'] = '!!!נתונים ידכנו בהצלחה';
    header('location: custum_header.php');
    die();
}

?>