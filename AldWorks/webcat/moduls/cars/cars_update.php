<?php

require_once "../../php/db_connect.php";//Data Base Connect
require_once "../../php/functions.php";//Data Base Connect


//Arrays to replace 
$current = array("'",'"',"`");
$replace = array("&#39;","&#34;","&#96;");



$car_id = $_POST['car_id'];
$car_name = str_replace($current, $replace, $_POST['car_name']);
$car_model = str_replace($current, $replace, $_POST['car_model']);
$car_hand = $_POST['car_hand'];
$car_year = $_POST['car_year'];
$car_engine = $_POST['car_engine'];
$car_transm = $_POST['car_transmission'];
$car_kilometers = $_POST['car_kilometers'];


$result = update_cars($car_name,$car_model,$car_hand,$car_year,$car_engine,$car_transm,$car_kilometers,$car_id);

if(!$result){

	$_SESSION['error_car_update'] = '!!!בעיה עם עדכון של האוטו';
	header('location: cars_list.php');
	die();
}else{
	$_SESSION['car_update'] = '!!!האוטו עודכן בהצלחה';
	header('location: cars_list.php');
	die();
}


?>