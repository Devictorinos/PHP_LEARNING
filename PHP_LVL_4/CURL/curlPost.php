<?php
echo "<pre>";
$url = "http://localhost/PHP_LERNING/PHP_LVL_4/CURL/curlPostResult.php";

$post = "name=victor&lastname=lubchuk&age=29";

$ch = curl_init();
curl_setopt($ch, CURLOPT_URL, $url);
curl_setopt($ch, CURLOPT_POST, 1);
curl_setopt($ch, CURLOPT_POSTFIELDS, $post);
$result = curl_exec($ch);
curl_close($ch);

echo $result;