<?php

//function that chek img size
function checkImgSize($files){

$maxFileSize = 10485760;

  foreach ($files['files']['size'] as $key => $size) {
  	
  	if($size > $maxFileSize){


  		 return false;
  	}else{

  		foreach ($files['files']['tmp_name'] as $imSize ) {
  			
  		
  			$imageSize[] = getimagesize($imSize);
  		}

  		return $imageSize;
  	}
  }

}

//checking and getting extensions
function checkExtention($files){

	foreach ($files['files']['name'] as $key => $name) {

	$names[] = strtolower(stripslashes($name));

	}

	//getting image extensions
	foreach ($names as  $ext) {	

		$path[] = pathinfo($ext, PATHINFO_EXTENSION);
	}
		 
	//checkin if extension of file is allowed
	function checkValidExt($path){ 

	$allowExt = array(//alowwed ext array
	"jpeg",
	"jpg",
	"png",
	"gif"
	);

	foreach ($path as $val) {

		if(in_array($val,$allowExt)){
			$validExt[] = $val;
		

	 }else{
	 	return false;}

		}

		return $validExt;
	}


	$validExt =  checkValidExt($path);

	return $validExt;

}//end of function check extension

//creating new image name
function imageRename($files){

	foreach ($files['files']['name'] as $key => $name) {

	$names[] = strtolower(stripslashes($name));
	}

	//geting image names
	foreach ($names as  $name) {
		$imgName[] = pathinfo($name ,PATHINFO_FILENAME );
	}

	return $imgName;
	
}//end of function create new image names


function createAllowedImages($imgName,$ext){


		foreach ($imgName as $ex =>  $Rname) {

			$rNames[] = "../../files/medium/".$Rname.rand(time(),12).'.'.$ext[$ex];
		}
		
		return $rNames;


}


// function createThumbsImages($imgName,$ext){


// 		foreach ($imgName as $ex =>  $Rname) {

// 			$rNames[] = "../../files/thumbs/".$Rname.rand(time(),12).'.'.$ext[$ex];
// 		}
		
// 		return $rNames;

// }


function getTMPNames($files){

	foreach ($files['files']['tmp_name'] as  $tmp) {
		
		$tmpName[] =  $tmp;
	}

	return $tmpName;
}



function CreateImages($files,$extFilter, $RnamedNames, $tmpNames, $AllowedW, $AllowedH ){
// ------------------------ CHECKIN IF IMAGE WIDTH AND HEIGHT IS ALLOWED


foreach ($files['files']['tmp_name'] as $files) {

	$list[] = list($width, $height) = getimagesize($files);	
}

$width = array();//width array
$height = array();//height array

//getting current width and height of images
foreach ($list as $key => $lis) {

	$width[] = $lis[0];
	$height[] = $lis[1];
}


//setting new width of images if not allowed
foreach ($width as $wkey => $w) {

	//checking if image width is greater that allowed
	if( $w > $AllowedW ){	

	$newWidth[$wkey] = $AllowedW;
	$newHeight[$wkey] = ceil($newWidth[$wkey] * $height[$wkey] / $width[$wkey]); 

	}else{

		 $newWidth[] = $width[$wkey];
		 $newHeight[] = $height[$wkey];



	}
}

//setting new height of images if not allowed after set a new width
foreach ($newHeight as $hkey => $h) {

			if($h > $AllowedH){

			$newH[$hkey] = $AllowedH;
			$newW[$hkey] = ceil($newH[$hkey] * $newWidth[$hkey] / $newHeight[$hkey]);

			}else{

				$newH[] = $newHeight[$hkey];
				$newW[] = $newWidth[$hkey];
				
			}
		}



/// Resample
foreach ($tmpNames  as $nkey => $nval) {

	 $image_p[] = imagecreatetruecolor($newW[$nkey], $newH[$nkey]);

	 if ($extFilter[$nkey] == 'jpeg' || $extFilter[$nkey] == 'jpg') {

	 	 $Nimages[$nkey] = imagecreatefromjpeg($nval);

	 }elseif($extFilter[$nkey] == 'png'){

	 $Nimages[$nkey] = imagecreatefrompng($nval);

	}

}

foreach ($RnamedNames as $rnkey => $rnval) {

	  imagecopyresampled($image_p[$rnkey], $Nimages[$rnkey], 0, 0, 0, 0, $newW[$rnkey], $newH[$rnkey], $width[$rnkey], $height[$rnkey]);


	 if ($extFilter[$rnkey] == 'jpeg' || $extFilter[$rnkey] == 'jpg') {

	  imagejpeg($image_p[$rnkey],$rnval);

	  }elseif($extFilter[$rnkey] == 'png'){

	 imagepng($image_p[$rnkey],$rnval);

	}

    imagedestroy($image_p[$rnkey]);
	  imagedestroy($Nimages[$rnkey]);

	}
}


function createNewImages($files,$extFilter,$newImages,$tmpNames,$w,$h){

	foreach ($newImages as $nekey => $newval) {

	$newname[] = $newval;
	}
		

	foreach ($newname as $newkey => $newval) {

		$newImage[] =  CreateImages($files,$extFilter,$newImages, $tmpNames ,$w,$h);
	}


	// foreach ($tnumbsImages as $thumkey => $thumval) {

	// 	$thumbName[] = $thumval;
	// }
		

	// foreach ($thumbName as $thkey => $thuval) {

	// 	$thunb[] =  CreateImages($files,$extFilter,$tnumbsImages, $tmpNames ,$thumb_w,$thumb_h);
	// }


}


//inserting in to data base images folders and url pathes
	function insertImagesToDB($db,$foldName,$urls){

		foreach ($foldName as $foldkey => $foldval) {

			

			$query = $db->prepare("INSERT INTO `files` ( `folder` , `image`) VALUES ( '".$foldval."' ,'".$urls[$foldkey]."' )");

			// $query->bindValue($foldkey+1,$foldval,PDO::PARAM_STR);
			// $query->bindValue($foldkey+1,$urls[$foldkey],PDO::PARAM_STR);			
			$query->execute();

	
		
		}

		$db = null;
		if($query)return true;
		else return faslse;		
	
	}

