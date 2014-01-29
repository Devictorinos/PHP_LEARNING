<?php

require_once "../../php/db_connect.php";//Data Base Connect
require_once "../../php/functions.php";//Data Base Connect


$result = add_car();

if(!$result){
	$_SESSION['error_add_car'] = '!!!בעיה עם הוספת מכונית חדשה';
	header('location: cars_list.php');
	die();

}else{

	$last_id = mysql_insert_id();
	$_SESSION['add_car'] = '!!!מכונית התספה בהצלחה';
	$_SESSION['new_car'] = $last_id;

	header('location: cars_list.php?pid='.$last_id.'');

	die();

}


?>
