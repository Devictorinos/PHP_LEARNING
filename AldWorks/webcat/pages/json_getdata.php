<?php

	require_once "../php/db_connect.php";//Data Base Connect
	require_once "../php/functions.php";//Data Base Connect

$page_id = $_POST['page_id'];

$result =  get_page_data_json($page_id);

if(!$result){
	return false;
}
else{

	echo json_encode($result);
}

?>

