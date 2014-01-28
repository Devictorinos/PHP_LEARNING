<?php
session_start();

header('Content-type: image/jpeg');
putenv('GDFONTPATH=' . realpath('.'));
$text = $_SESSION['secure'];
//var_dump($text);
$fontSize = 15;

$imageWindth = 130;
$imageHeight = 40;

$image = imagecreate($imageWindth, $imageHeight);
imagecolorallocate($image, 255, 255, 255);
$textColor = imagecolorallocate($image, 56, 56, 65);

for ($i=0; $i < 30; $i++) {
  
    $x1 = rand(1, 100);
    $y1 = rand(1, 100);
    $x2 = rand(1, 100);
    $y2 = rand(1, 100);

    imageline($image, $x1, $y1, $x2, $y2, $textColor);
};


imagettftext($image, $fontSize, 0, 15, 30, $textColor, 'arial.ttf', $text);

imagejpeg($image);
imagedestroy($image);
