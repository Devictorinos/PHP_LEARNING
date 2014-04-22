<?php

  require_once '../php/db_connect.php';
  require_once '../php/check_login.php';
  require_once 'img_functions.php';


define('WIDTH',1024);
define('HEIGHT',768);
define('THUMBWIDTH' ,60);
define('THUMBHEIGHT',60);


 $files = $_FILES;


  try {
	
	 $files = $_FILES;
} catch (Exception $e) {

	ECHO $e->getMessage();
}

// var_dump($files);
//exit();

$names = array();
$tmp_names = array();





 $extFilter = checkExtention($files);//checking extension
 $RnamedNames = imageRename($files);//getting new names of images
 $newImageSize = checkImgSize($files);//resizing images
 $tmpNames = getTMPNames($files);//getting temporary names



 $newImages = createAllowedImages($RnamedNames,$extFilter);//creating new images
 // $tnumbsImages = createThumbsImages($RnamedNames,$extFilter); //creating thumbs images



  //creating images
  $NEW_IMAGES = createNewImages($files,$extFilter,$newImages,$tmpNames,WIDTH,HEIGHT);//creating images


    //getting url pass for insert images with skeditor
	foreach ($newImages as $uimg => $uname) {

		$url[] =  explode("/",$uname);
		
	}

	$urlpath = $url;

	foreach ($urlpath as $urlkey => $urlval) {

		$urls[] =  "http://".$_SERVER['HTTP_HOST']."/".$urlval[2]."/".$urlval[3]."/".$urlval[4];
	}


	//getting folders names of images
	foreach ($newImages as $foldkey => $foldval) {

		$foldName[] = '/medium'; 
		
	}


	

$result =  insertImagesToDB($db,$foldName,$urls);

if($result){

	$_SESSION['upload_complete'] = 'All images uploaded successful !!! ';
	header('Location: images_list.php');
	exit();
}else{

	$_SESSION['upload_error'] = 'Problem with Upload Images !!! ';
	header('Location: images_list.php');
	exit();
}






