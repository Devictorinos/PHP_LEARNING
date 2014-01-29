<?php


// $mysql_host = 'localhost';
// $mysql_user = 'root';
// $mysql_pass = '';
// $mysql_db_name = 'treid_zafon';

$mysql_host = 'localhost';
$mysql_user = 'shirib4';
$mysql_pass = '2706';
$mysql_db_name = 'shirib4_tradein';

// $mysql_host = 'master-study1.netfirmsmysql.com';
// $mysql_user = 'victor';
// $mysql_pass = 'victordb';
// $mysql_db_name = 'october2012_victor';

mysql_connect($mysql_host,$mysql_user,$mysql_pass) or die('Cannot connect to the srver');
mysql_select_db($mysql_db_name) or die('Cannot find Data Base');
mysql_query('SET NAMES "utf8" ');
if(!isset($_SESSION))
session_start();




?>