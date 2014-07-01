<?php

$url = "http://localhost/PHP_LERNING/PHP_LVL_4/CURL/test.php";
$ch = curl_init();
curl_setopt($ch, CURLOPT_URL, $url);
curl_exec($ch);
curl_close($ch);
