<?php

$info = getimagesize('1.jpg');

//  

$im = imagecreatefromjpeg("1.jpg");//Create a new image from file or URL

/*echo imageSX($im);
echo "<br />";
echo imageSY($im);
echo "<br />";*/
$color = imagecolorat($im, 95, 95);//show color of image
// echo "<br />";
// echo $color;
// echo "<br />";
// $r = ($color >> 16) & 0xFF;
// $g = ($color >> 8) & 0xFF;
// $b = $color & 0xFF;
// echo "$r $g $b";
// echo "<br />";
$col = imagecolorsforindex($im, $color);//geting image RGBA color
// echo "<pre>";
// print_r($col);
// echo "</pre>";

//imageJpeg($im, "new_1.jpg");
header("Content-type: image/jpeg");// means the type of content that we show is jpeg/jpg image
imageJpeg($im);
imageDestroy($im);
