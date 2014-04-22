<?php
session_start();
//require_once "php/db_connect.php";//Data Base Connect
//require_once "php/functions.php";//Functions
//include "php/messages.php";//Session Messages


/**
 * A simple, clean and secure PHP Login Script
 *
 * MINIMAL VERSION
 * (check the website / github / facebook for other versions)
 *
 * A simple PHP Login Script.
 * Uses PHP SESSIONS, modern password-hashing and salting
 * and gives the basic functions a proper login system needs.
 *
 * Please remember: this is just the minimal version of the login script, so if you need a more
 * advanced version, have a look on the github repo. there are / will be better versions, including
 * more functions and/or much more complex code / file structure. buzzwords: MVC, dependency injected,
 * one shared database connection, PDO, prepared statements, PSR-0/1/2 and documented in phpDocumentor style
 *
 * @package php-login
 * @author Panique
 * @link https://github.com/panique/php-login/
 * @license http://opensource.org/licenses/MIT MIT License
 */

// checking for minimum PHP version
if (version_compare(PHP_VERSION, '5.3.7', '<')) {
    exit("Sorry, Simple PHP Login does not run on a PHP version smaller than 5.3.7 !");
} else if (version_compare(PHP_VERSION, '5.5.0', '<')) {
    // if you are using PHP 5.3 or PHP 5.4 you have to include the password_api_compatibility_library.php
    // (this library adds the PHP 5.5 password hashing functions to older versions of PHP)
    require_once("login/libraries/password_compatibility_library.php");
}

// include the configs / constants for the database connection
require_once("login/config/db.php");

// load the login class
require_once("login/classes/Login.php");

// create a login object. when this object is created, it will do all login/logout stuff automatically
// so this single line handles the entire login process. in consequence, you can simply ...
$login = new Login();



?>
<!doctype html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>עמוד כניסה</title>
	<link rel="stylesheet" href="css/bootstrap.min.css" media="screen"/>
	<link rel="stylesheet" href="css/bootstrap-theme.min.css" media="screen"/>
	<link rel="stylesheet" href="css/glyphicons.css" media="screen"/>
	<link rel="stylesheet" href="css/style.css" />
	<script type="text/javascript" src="js/jquery-2.0.3.min.js"></script>
	<script type="text/javascript" src="js/modernizr.js"></script>
	<script type="text/javascript" src="js/bootstrap.min.js"></script>
	<script type="text/javascript" src="js/functions.js"></script>

	<script type="text/javascript">

	$(document).ready(function(){

		<?php

		if(isset($_SESSION['logout']) || isset($_SESSION['error_pass']) || isset($_SESSION['error_user'])){

			echo'setTimeout("$(\'.logout_message_container\').fadeTo( \'slow\', 0.0)",5000);';
			if(isset($_GET['logout']) || isset($_SESSION['error_pass']) || isset($_SESSION['error_user'])){
			unset($_SESSION['logout']);
			unset($_SESSION['error_pass']);
			unset($_SESSION['error_user']);


		}

		 }else{


		 	echo "$('.logout_message_container').css({

		 	 	'visibility':'hidden'
		 	 }) ";
			 }







		?>
		


	});//End doc ready function



	</script>
</head>
<body>

	<?php


		// ... ask if we are logged in here:
if ($login->isUserLoggedIn() == true) {
    // the user is logged in. you can do whatever you want here.
    // for demonstration purposes, we simply show the "you are logged in" view.
   

    include("main_page.php");

} else {
	
	// echo 'not login ';
	
    // the user is not logged in. you can do whatever you want here.
    // for demonstration purposes, we simply show the "you are not logged in" view.
    include("login/views/not_logged_in.php");
}





	//header('location: main_page.php');

	?>
	
</body>
</html>