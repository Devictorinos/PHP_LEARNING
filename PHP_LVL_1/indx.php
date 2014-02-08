<?php
//phpinfo();
//date_default_timezone_set('Asia/Jerusalem');

/*
4 вида содержимого директивы max_post_size

50m - megabyte
1g - gigabyte
1024k - kilobyte
4096 - bite
 */
$size = ini_get('post_max_size');//достаем значение директивы php в файле php.ini // obtain the value of php directives in php.ini
$letter = $size{strlen($size)- 1};
$size = (int)$size;

switch ($letter) {
    case 'K'://kilobyte
        $size *= 1024; //returning bytes
        break;

    case 'M'://megabyte
        $size *= 1024 * 1024;//returning bytes
        break;

    case 'G'://gigabyte
        $size *= 1024 * 1024 * 1024;//returning bytes
        break;
}



var_dump($size);






echo "<br />==================================<br />";


$arr = ["viktor", "sergey", "petr", "masha"];

$arr1 = [
 "name" => "viktor",
 "second_name" => "sergey",
 "third_name" => "petr",
 "fourth_name" => "masha"
  ];

echo current($arr).PHP_EOL;
 next($arr).PHP_EOL;
echo current($arr).PHP_EOL;
 next($arr).PHP_EOL;
echo current($arr).PHP_EOL;
 next($arr).PHP_EOL;
echo current($arr).PHP_EOL;

echo key($arr);

echo "<br>";
$odd = 50;

for ($i=0; $i <= 50; $i++) {

    if (($i % 2) != '') {
        echo $i . "<br>";
    }
  
};


$var = "HELLO";
$length = strlen($var)-1;
echo $length;

echo "<br>";
echo "<br>";
echo "<br>";

$i = 0;
while ($i <= strlen($var)-1) {

    echo $var{$i}."<br>";
    $i ++;

};


echo "<br />========================================<br />";

$a = 1;


echo ++$a;


echo "<br />========================================<br />";








echo "<br />========================================<br />";
echo "<br />========================================<br />";




$day = strftime('%d');
$mon = strftime('%B');
$year = strftime('%Y');

$v = "viktor";
$$v = "sergey";

echo " My Name Is ".$viktor.PHP_EOL;

$a_String = "la la la";
$a_var = "a_String";
echo $$a_var;
echo "\n\t";
$vi = "viktor";
echo "hello \n\t $vi";
echo "\n\t";
echo "<br />";
echo <<<'LABEL'
    hello "a" http:\viktor.com 
    ':'. helol i go to c:'\\\\ httm'
LABEL;

$juice = "apple";


echo "He drank some juice mado of $juice.";
echo "<br />";
// echo "He drank some juice mado of $juices";
echo "<br />";
echo "He drank some juice mado of {$juice}s";



$name = "My Name Is viktor.";
//getting first character
$firstChar  = $name{0};

$thirdChar = $name{3};

$len = strlen($name);

$lastChar = $name{strlen($name) - 1} = "!";
echo "<br />";
echo $firstChar;
echo "<br />";

echo $thirdChar;
echo "<br />";

echo $lastChar;
echo "<br />";

echo $len;
echo "<br />";

$foo = "4bar";
$bar = (float)$foo;

echo gettype($bar);

define("COPYRIGHT", "super mega webmaster!!");

echo "<br />";
echo COPYRIGHT;

$r= true;

if ($r) :
    echo "helloleeo";
    echo "helloleeo";
    echo "helloleeo";
    echo "helloleeo";

else :

    echo "nonono";
    echo "nonono";
    echo "nonono";
    echo "nonono";
    echo "nonono";

endif;


$aaa = "1";
$bbb = "2";
$ccc = array("3", "4");

if (isset($aaa, $bbb, $ccc[1])) {
    echo "<br>all set";
}
echo "================================<br />";

$abs = array("r","a","b");

$bcd = serialize($abs);
$cde = unserialize($bcd);
echo $bcd."<br>";
print_r($cde);


echo "<br />";
echo "=========================<br />";

$time  = time();
$time = date("d-m-Y h-i-s", $time);
echo $time;


echo "<br />";
echo "=========================<br />";

?>
<!doctype html>
<html lang="he">
<head>
  <meta charset="UTF-8">
  <title>Document</title>
</head>
<body>
  
  <div id="content">
    
    <h1></h1>


  </div>
      

</body>
</html>

