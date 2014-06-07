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
$img->uploadMainImage();
$img->createThumbs(200, 200, 'Pic1/')
    ->createThumbs(300, 400, 'Pic2/')
    ->createThumbs(600, 600, 'Pic3/');
$result = $img->fishish();

echo "<pre>";
var_dump($result);
echo "</pre>";



