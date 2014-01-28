<?php
    // $filename = '1.jpg';
    // $rotang = 180; // Rotation angle
    // $source = imagecreatefromjpeg($filename) or die('Error opening file '.$filename);
    // imagealphablending($source, false);
    // imagesavealpha($source, true);

    // $rotation = imagerotate($source, $rotang, imageColorAllocateAlpha($source, 0, 0, 0, 127));
    // imagealphablending($rotation, false);
    // imagesavealpha($rotation, true);

    // header('Content-type: image/png');
    // imagejpeg($rotation);
    // imagedestroy($source);
    // imagedestroy($rotation);
// File and rotation
$filename = '1.jpg';
$degrees = 90;

// Content type
header('Content-type: image/jpeg');

// Load
$source = imagecreatefromjpeg($filename);

// Rotate
$rotate = imagerotate($source, $degrees, 0);

// Output
imagejpeg($rotate);

// Free the memory
imagedestroy($source);
imagedestroy($rotate);
