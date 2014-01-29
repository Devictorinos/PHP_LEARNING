<?php


require_once "../php/db_connect.php";//Data Base Connect
require_once "../php/functions.php";//Data Base Connect

$image_id = $_GET['img_id'];
$file_name = $_GET['file'];
$page_id = $_GET['pid'];
//echo $file_name;
//die();
unlink('server/php/files/'.$file_name);
unlink('server/php/files/little/'.$file_name);
unlink('server/php/files/medium/'.$file_name);
unlink('server/php/files/thumbnail/'.$file_name);

$delete  = images_del($image_id);

if(!$delete){
	$_SESSION['error_image_del'] = '!!!בעיה עם מחיקת תמונה';
	header('location: images_stock_list.php?pic_id='.$page_id.'');
	die();
}
else{

	$_SESSION['image_del'] = '!!!תמונה נמחקה בהצלחה';
	header('location: images_stock_list.php?pic_id='.$page_id.'');
	die();
}


?>