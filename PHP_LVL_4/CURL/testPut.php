<?php

$ch = curl_init();
$url = "http://localhost/PHP_LERNING/PHP_LVL_4/CURL/curlput/put.txt";
$str = "HELLO, WORLD i'm here ";

$tmpFile = tmpfile();

fwrite($tmpFile, $str);
fseek($tmpFile, 0);

curl_setopt($ch, CURLOPT_URL, $url);
curl_setopt($ch, CURLOPT_PUT, true);
curl_setopt($ch, CURLOPT_INFILE, $tmpFile);
curl_setopt($ch, CURLOPT_INFILESIZE, strlen($str));

$result = curl_exec($ch);
fclose($tmpFile);
curl_close($ch);
