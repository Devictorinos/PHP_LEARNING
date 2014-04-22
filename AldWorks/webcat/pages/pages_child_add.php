<?php

require_once "../php/db_connect.php";//Data Base Connect
require_once "../php/functions.php";//Data Base Connect

if(!isset($_GET['pid'])){
	header('location: ../main_page.php');
}else{
	$page_id = $_GET['pid'];
}

	//Getting create page date
	$date = Date('d-m-y h:m:s');
 	$datetime = strtotime($date);


$children = get_children_count($page_id);
//echo $children['children'];
//die();

if($children['children'] == 4 ){

	$_SESSION['error_children_'] = '!!! בעיה!!! עברתם את הכמות המותרת של תת דפים';
	header('location: pages_list.php');
	die();
}else{


$result = add_child_page($page_id ,$datetime);

if(!$result){

	$_SESSION['add_error'] = '!!!בעיה עם הוספת דף חדש';
	header('location: pages_list.php');
	
}else{

	$last_id = mysql_insert_id();
	$_SESSION['last_id'] = $last_id;
	$_SESSION['add_page'] = 'דף הוסף בהצלחה  !!! &nbsp; עכשיו אפשר לערוך אותו';
	header('location: pages_edit.php?pid='.$last_id.'');
	exit();
}

}


?>