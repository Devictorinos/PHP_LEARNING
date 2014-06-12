<?php
/**
 * Created by PhpStorm.
 * User: victorino
 * Date: 6/5/14
 * Time: 8:52 PM
 */

include "UploadImage.Class.php";

/*echo "<pre>";
var_dump($_FILES);*/
//phpinfo();

$img = new UploadImage();
$img->explodeImage($_FILES['image']);
//$img->addAllowedExtention("text/plain");

//$img->changeAllowedExtention(["text/plain"]);
//$img->changeAllowedWidth(300);
//$img->changeAllowedHeght(300);
//$img->setAllowedSize(10);
$img->changeTemporaryPath('/var/www/UsefulClasses/images/');
$img->changePath('/var/www/UsefulClasses/images/Pic1/');
$img->uploadMainImage();
$img->createThumbs(200, 200, 'pic/')->changePath('/var/www/UsefulClasses/images/Pic2/')
    ->createThumbs(300, 400, 'pic/')->changePath('/var/www/UsefulClasses/images/Pic3/')
    ->createThumbs(600, 600, 'pic/', array($img, 'rotateImage'), [270, 0, null]);


/*$img->createThumbs(200, 200, 'Pic1/', array($img, 'rotateImage'), [90, 0, null])
    ->createThumbs(300, 400, 'Pic2/', array($img, 'rotateImage'), [180, 0, null])
    ->createThumbs(600, 600, 'Pic3/', array($img, 'rotateImage'), [270, 0, null])
    ->createThumbs(600, 600, 'Pic4/');*/
$result = $img->fishish();

echo "<pre>";
var_dump($result);
echo "</pre>";



