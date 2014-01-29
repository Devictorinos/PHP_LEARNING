<?php


require_once "../../php/db_connect.php";//Data Base Connect
require_once "../../php/functions.php";//Data Base Connect


$car_id = $_POST['car_id'];


$result = get_car_data($car_id);


if(!$result){
	die('problem with get data of image');
}
else{
	echo json_encode($result);
}



?>