<?php


require_once "../php/db_connect.php";//Data Base Connect
require_once "../php/functions.php";//Data Base Connect

//Arrays to replace 
$current = array("'",'"',"`");
$replace = array("&#39;","&#34;","&#96;");


$image_id = $_POST['stock_img_id'];

$image_name = preg_replace("/[^A-Za-zא-ת0-9_ ]/","",$_POST['image_name']);
$image_name =str_replace($current, $replace, $image_name);


$image_title = preg_replace("/[^A-Za-zא-ת0-9-_ ]/","",$_POST['image_title']);
$image_title = str_replace($current, $replace,$image_title);



$image_descr = preg_replace("/[^A-Za-zא-ת ]/","",$_POST['image_desc']);
$image_descr = str_replace($current, $replace,$image_descr);


$image_catigory = $_POST['image_catigory_id'];

$image_car = $_POST['image_car_id'];


if(!isset($_POST['images_slider'])){

	$image_slider = "no";

}else if(isset($_POST['images_slider'])){
	$image_slider = "yes";
}




if(!isset($_POST['images_cover'])){

	$image_cover = "no";

}else if(isset($_POST['images_cover'])){
	
	$image_cover = "yes";
}


$result = update_images($image_name,$image_title,$image_descr,$image_catigory,$image_car,$image_slider,$image_cover,$image_id);

if(!$result){

	$_SESSION['error_update_image'] = '!!!בעיה עם עדכון תמונה';
	header('location: images_stock_list.php');

}else{

	$_SESSION['update_image'] = '!!!תמונה עודכנה בהצלחה';
	header('location: images_stock_list.php');
}


?>