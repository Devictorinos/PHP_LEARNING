<?php

require_once "../../php/db_connect.php";//Data Base Connect
require_once "../../php/functions.php";//Data Base Connect


$car_id = $_GET['pid'];


$result = delete_car($car_id);

if(!$result){

	$_SESSION['error_del_car'] = '!!!מכונית נמחקה בהצלחה';
	header('location: cars_list.php');
	die();

}else{

	$_SESSION['del_car'] = '!!!מכונית נמחקה בהצלחה';
	header('location: cars_list.php');
	die();
}
?>