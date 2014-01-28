<?php

$im = imageCreateTrueColor(500, 500);//creating canvas
$c = imageColorAllocate($im, 120, 45, 67);//creating color
imageLine($im, 0, 0, imagesx($im), imagesy($im), $c);//creating line from left top to bottom right
imageLine($im, 0, imagesy($im), imagesx($im), 0, $c);

imagefilledrectangle($im, 100, 200, 400, 300, $c);//creating rectangle

$d = imageColorAllocate($im, 255, 255, 255);//creating new color
// imagerectangle($im, 99, 199, 401, 301, $d);
imagesetthickness($im, 3);//setting width of border
imagerectangle($im, 97, 197, 403, 303, $d);//creating border

imagearc($im, 250, 100, 150, 150, 0, 360, $d);//creating circle

$y = imageColorAllocate($im, 255, 255, 34);//creating new color
imagefill($im, 250, 100, $y);//fill background with color.


header("Content-type: image/png");
imagepng($im);//showing image
imagedestroy($im);//destroing image
