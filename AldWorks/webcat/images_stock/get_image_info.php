<?php

require_once "../php/db_connect.php";//Data Base Connect
require_once "../php/functions.php";//Data Base Connect


$image_id = $_POST['image_id'];


$result = get_one_image_data($image_id);


if(!$result){
	die('problem with get data of image');
}
else{
	echo json_encode($result);
}


?>