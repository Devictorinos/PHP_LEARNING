<?php
/*
* . точка в регулярном выражении значит абсолютно любой символ * пример /S.h/*
* . point in a regular expression means is any character * example  /S.h/ *
* * звездочка значит абсолютно все вообще или все между * пример  /S.*m/*
* * Star means absolutely everything at all or everything in between * example / S. * m / *
 */
$reg = "/th/";
$str = "Soffdsfdsgmething string 123 string";
echo preg_match($reg, $str);
echo "\n";
$reg = "/S.*m/";

preg_match($reg, $str, $match);

var_dump($match);

// Class Symbols
// \s - любой пробельный символ
// \S - любой не пробельный символ 
// \w - любая буква или цифра
// \W - любой символ который не является буквой или цифрой
// \d - любая цифра
// \D - любой символ только не цифра


//imaginary characters , мнимые символы.
// ^ - means beginning of line
// $ - end of line

//МОДИФИКАТОРЫ modifiers
// i - case insensitive
// x - spaces are not counted не учитываются пробелы
// s - "string \n 9"  - turns all the lines in 1 line превращает все строки в 1 строку.
// m - "string \n 9"  - leaves the line as they are отсавляет строки как они есть
$reg = "/ab.*c/i";
echo preg_match($reg, "abcc")."<br />";
echo preg_match($reg, "ABcc")."<br />" ;

echo "======================<br />";

$reg = "/a b c/";
echo preg_match($reg, "a b c")."<br />";
echo preg_match($reg, "abc")."<br />";

$reg = "/a b c/x";
echo preg_match($reg, "a b c")."<br />";
echo preg_match($reg, "abc")."<br />";

echo "======================<br />";

$reg = "/^\d/s"; // set by default
echo preg_match($reg, "string\n9")."<br />";

$reg = "/^\d/m";
echo preg_match($reg, "string\n9")."<br />";



//grouping brackets , группирующие скобки
// ()  example (\d{2})-(\d{2})- (\d{4})  this exaple will be match to a date like 02-02-1985

//INTERVALS
//[A-Z] [a-z] [0-9]


//ALTERNATIVES
// [] - значит альтернативу
//пример :
$reg = "/a[012]b/"; //совпадение будет если  любой из трех указаных в скобках символов будет между буквами А  и Б.
echo preg_match($reg, "a1b");


//NEGATIVE
// ^ 
$reg = "/a[^012]b/";// выражение значит что все кроме 012
$reg = "/a[^0-7]b/";// выражение значит что все кроме цифр от 0 до 7


//OUTPUT special characters
//для того чтобы экранировать слэш  с наклоном в право пишется так \/
//для того чтобы экранировать слэш  с наклоном в лево пишется так \\\
//для того чтобы экранировать точку  пишется так \. без лжша это будет читаться как любой символ а не точка.
echo "<br />";
$reg = "/a\/b\\\c\./";

echo preg_match($reg, "a/b\c.");

//repeat quantifiers квантификаторы повторений.

// * значит повторение 0 или более раз
// + значит повторение 1 и более раз
// ? значит 0 или 1 повторение



//REPEAT A number of times повторение определенное количесво раз.

//{1,3} means repeat one to three times , значит повторение цифры от 1 до 3 раз. независимо от общего количества цифр в строке.
//{3} means repeat  three times ,значит повторение цифры 3 раза.
//{2,} means 2 to infinitum , от 2 и до бесконечности
$regex = "/ab\d{1,2}/";//цифра (не определенное число а именно цифра) повторяется от 1 до 2 раз
echo preg_match($regex, "ab2");
echo "<br />";

echo "=============================<br />";
//$string = '<a href>';
//$string = '<a href="http://biz-support.co.il">biz-support</a>';

//preg_match_all("/\W/",$string,$matches);

//var_dump($matches);
