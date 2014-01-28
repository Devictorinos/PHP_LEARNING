<?php


$config['db'] = array(

// 'host' => 'localhost',
// 'username' => 'viktor',
// 'password' => 'viktor',
// 'dbname' => 'cms'

'host' => 'localhost',
'username' => 'biztest',
'password' => 'lappidottesbiz',
'dbname' => 'biztest_test'

	);

try {
	
	$db = new PDO('mysql:host='.$config['db']['host'].';dbname='.$config['db']['dbname'].';charset=utf8',$config['db']['username'],$config['db']['password']);
	$db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (Exception $e) {

	ECHO $e->getMessage();
}
if(!isset($_SESSION))
session_start();






?>