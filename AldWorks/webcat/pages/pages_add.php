<?php

require_once "../php/db_connect.php";//Data Base Connect
require_once "../php/functions.php";//Data Base Connect
	
	//Getting create page date
	$date = Date('d-m-y h:m:s');
 	$datetime = strtotime($date);

$result = add_page($datetime);

if(!$result){
	$_SESSION['add_error'] = '!!!בעיה עם הוספת דף חדש';
	header('location: pages_list.php');
}
else{

	$last_id = mysql_insert_id();
	$_SESSION['last_id'] = $last_id;
	$_SESSION['add_page'] = 'דף הוסף בהצלחה  !!! &nbsp; עכשיו אפשר לערוך אותו';
	header('location: pages_edit.php?pid='.$last_id.'');
	exit();
}


?>