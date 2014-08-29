<?php

// . - mean all synbols except brake lines
// ? mean any symbol if exists "/PHP.?5/" mean - maybe is any sumbol or not after php and after 5 it is walid for both strings like  - PHP5 or  PHP 5 OR php_5
// + mean minimum must be one symbol and more (count of symbols is unlimited)
// * mean any symbols (no matter their number) include spaces
// ?: mean must not get  - "john smith" - /([a-z ]+)(?:ith)/
// ?P<name> mean - we can give a name to matches
// i case insensitive
// m multiple line search
// S same is . and \n
// x excluding white spaces

$str = "April 15, 2003";
$pattern = '/(\w+) (\d+), (\d+)/i';

$replacement = "\${1}1, \$3";
echo  preg_replace($pattern, $replacement, $str);
echo "<br>";
//echo  preg_replace('/(\w+) (\w+) (\w+)/e', strtoupper('$2'), $str1);//depricated - /e

echo "<hr>";
$keywords = preg_split('/[\s,]/', $str);

var_dump($keywords);
echo "<hr>";
$str1 = "string";
$keywords1 = preg_split('//', $str1, -1, PREG_SPLIT_NO_EMPTY);

var_dump($keywords1);
