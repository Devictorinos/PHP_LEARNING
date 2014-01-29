<?php


$mysql_host = 'localhost';
$mysql_user = 'root';
$mysql_pass = '';
$mysql_db_name = 'treid_zafon';



mysql_connect($mysql_host,$mysql_user,$mysql_pass) or die('Cannot connect to the srver');
mysql_select_db($mysql_db_name) or die('Cannot find Data Base');
mysql_query('SET NAMES "utf8" ');
if(!isset($_SESSION))
session_start();




?>