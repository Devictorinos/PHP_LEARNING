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


$img = new UploadImage();
$img->addImageExtention('jjj/ggg');
$img->explodeImage($_FILES['image']);

$result = $img->uploadMainImage()->showErrors();
echo "<pre>";
var_dump($result);

