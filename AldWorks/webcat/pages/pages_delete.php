<?php

require_once "../php/db_connect.php";//Data Base Connect
require_once "../php/functions.php";//Data Base Connect
	

if(!isset($_GET['pid'])){
	header('location:../main_page.php');
}else{

	$page_id = $_GET['pid'];
}


//Condition if the page ID 1 ,it cannot be deletet
if($page_id != 1){
	
	$result = delete_page($page_id);
	
	if(!$result){
		$_SESSION['del_page_error'] = '!!!בעיה עם מחיקת הדף';
		header('location: pages_list.php');
		
	}else{

		$_SESSION['del_page'] = '!!!דף נמחק בהצלחה';
		header('location: pages_list.php');
	}

}else{
	$_SESSION['home_page'] = "אי אפשר למחוק דף הבית";
	header('location: pages_list.php');
	
}




	// $result = delete_page($page_id);

	// if(!$result){
	// 	die('problem with deleting page');
	// }else{

	// 	header('location: pages_list.php');
	// }



?>