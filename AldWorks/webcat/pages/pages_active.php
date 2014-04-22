<?php

require_once "../php/db_connect.php";//Data Base Connect
require_once "../php/functions.php";//Data Base Connect


//Send status to Data Base

$pages_id = $_POST['page_id'];
$pages_status = $_POST['page_status'];

// header('HTTP/1.0 404 Not Found');
// exit($pages_status);

$result = change_status($pages_status,$pages_id);

	if(!$result)
	echo 'problem';
	else
	echo 'success';


?>