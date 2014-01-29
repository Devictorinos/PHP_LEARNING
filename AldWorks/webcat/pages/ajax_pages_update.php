<?php

	require_once "../php/db_connect.php";//Data Base Connect
	require_once "../php/functions.php";//Data Base Connect

//Arrays to replace 
$current = array("'",'"',"`");
$replace = array("&#39;","&#34;","&#96;");


$page_id = $_POST['page_id'];

$page_name =  preg_replace("/[^A-Za-zא-ת0-9_ ]/","",$_POST['page_name']);
$page_name	= str_replace($current, $replace, $page_name);


$page_nice_url = preg_replace("/[^A-Za-zא-ת ]/","",$_POST['page_name']);
$page_nice_url = str_replace(" ","-", $page_nice_url);

$page_title = str_replace($current, $replace,$_POST['page_title']);

$page_order = $_POST['page_order'];
//$page_parent = $_POST['page_parent'];

//Getting udate page date
$date = Date('d-m-y h:m:s');
$datetime = strtotime($date);


	$result = fast_page_update($page_name,$page_title,$page_order,$page_id,$page_nice_url,$datetime);

	if($result == false){

     	$_SESSION['error_fe_child'] = 'בעיה עם החלפת הורה !!!  כל הורה יכול להחזיק עד 4 ילדים';
     	echo 'problem with update data';
	}else{
		$_SESSION['fe_update'] = '!!!עדכון בוצע בהצלחה';
		echo 'success';
	}
//}
?>