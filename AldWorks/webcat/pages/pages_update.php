<?php


require_once "../php/db_connect.php";//Data Base Connect
require_once "../php/functions.php";//Data Base Connect




if(isset($_POST['submit_prev'])){


	//Arrays to replace 
	$current = array("'",'"',"`");
	$replace = array("&#39;","&#34;","&#96;");


	$pages_id = $_POST['page_id'];

	$pages_name = preg_replace("/[^A-Za-zא-ת0-9_ ]/","",$_POST['page_name']);
	$pages_name	= str_replace($current, $replace, $pages_name);

	//$page_nice_url = preg_replace("/[^A-Za-zא-ת ]/","",$_POST['page_name']);
	//$page_nice_url = str_replace(" ","-", $page_nice_url);

	$pages_title = str_replace($current, $replace,$_POST['page_title']);

	$pages_order = $_POST['page_order'];
	$pages_type = $_POST['page_type'];
	//$pages_parent_id = $_POST['page_parent_id'];
	$pages_content = $_POST['page_content'];





	$result = update_preview($pages_id,$pages_name,$pages_title,$pages_order,$pages_type,$pages_content);
	if($result){

		$_SESSION['preview'] = 'start';
		// $_SESSION['back_id'] = $pages_id;
		header('location: ../../index.php?pid='.$pages_id.'');
		exit();
	}else{

		$_SESSION['preview_error'] = 'קיימת בעיה בלהראות את הדף';
		echo 'problem with update data';
		exit();
	}




}

if(isset($_POST['submit'])){


//Arrays to replace 
$current = array("'",'"',"`");
$replace = array("&#39;","&#34;","&#96;");

$pages_id = $_POST['page_id'];

$pages_name = preg_replace("/[^A-Za-zא-ת0-9_ ]/","",$_POST['page_name']);
$pages_name	= str_replace($current, $replace, $pages_name);

$page_nice_url = preg_replace("/[^A-Za-zא-ת ]/","",$_POST['page_name']);
$page_nice_url = str_replace(" ","-", $page_nice_url);

$pages_title = str_replace($current, $replace,$_POST['page_title']);

$pages_order = $_POST['page_order'];
$pages_type = $_POST['page_type'];
//$pages_parent_id = $_POST['page_parent_id'];
$pages_content = $_POST['page_content'];

$pages_meta_title = str_replace($current, $replace, $_POST['page_meta_title']);

$pages_meta_descr = str_replace($current, $replace,$_POST['page_meta_desc']);

$pages_meta_keywords = preg_replace("/[^A-Za-zא-ת0-9_ ]/","",$_POST['page_meta_keywords']);
$pages_meta_keywords = str_replace($current, $replace, $pages_meta_keywords);

$page_update_date = $_POST['page_date'];

//die($page_update_date);
//echo $children['children'];
//die();




//}else{





$result = update_pages($pages_id,$pages_name,$pages_title,$pages_order,$pages_type,$pages_content,$page_nice_url,$pages_meta_title,$pages_meta_descr,$pages_meta_keywords,$page_update_date);

if(!$result){

	$_SESSION['error_edit_page'] = '!!! בעיה עם עדכון הדף';
	header('location: pages_edit.php?pid='.$pages_id);
	
}else{
	

	  if($pages_name == ''){

	 	$last_page = $_SESSION['last_id'];

	 	del_page_without_name($last_page);

	 	unset($_SESSION['last_id']);
	 	
	 	header('location: pages_list.php');

	 }else{


		$_SESSION['edit_page'] = '!!! דף עודכן בהצלחה';
		header('location: pages_list.php');
	}
}

}

//}
?>