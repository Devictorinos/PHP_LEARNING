<?php
echo "<pre>";

$file = fopen('empty.txt', 'w');

$url = "http://localhost/PHP_LERNING/PHP_LVL_4/CURL/test.txt";
$ch = curl_init();
curl_setopt($ch, CURLOPT_URL, $url);
curl_setopt($ch, CURLOPT_FILE, $file);
$result = curl_exec($ch);
curl_close($ch);

echo $result;