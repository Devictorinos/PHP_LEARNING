<?php
session_start();


$data = $_POST['data'];
$captcha = $_SESSION['captcha'];

echo $data . " data";
echo "<hr />";
echo $captcha . " session";
echo "<hr />";

