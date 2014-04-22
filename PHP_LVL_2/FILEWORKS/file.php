<?php


$file = "text.txt";

if (file_exists("text.txt")) {
    echo "yes";
} else {
    echo "no";
}

echo fileatime("text.txt");

$fopen = fopen("text.txt" , "r");

echo $fopen;

fclose($fopen);

echo fileatime("text.txt");

$string = '{
    chips: [
        {
            doritos: "yum",
            fritos: -2147483648
        }
    ]
}';
preg_match_all("/\b(\w.+?)\b/i", $string, $matches);
$matchArray = array();
$replaceArray = array();
$matchArray =$matches[0];


$replaceArray = array_map(function($key) {

    return '"'.$key.'"';

}, $matchArray);

echo "<pre>";
print_r($replaceArray);
echo "</pre>";

echo "<pre>";
print_r($matchArray);
echo "</pre>";

$str  = preg_replace($replaceArray, $matchArray, $string);

echo $str;