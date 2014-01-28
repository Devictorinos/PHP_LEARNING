<?php
include 'db.php';
include 'functions.php';

if(isset($_POST['login'])){





$username = $_POST['userName'];
$password = $_POST['password'];



$pass = do_hash($password);

$checkName = checkUser($db,$pass);

if($checkName['name'] == $username && $checkName['password'] == $pass){

	$_SESSION['user_name'] = $username;
	header('location: ../main_page.php');
	exit();

}else{
	echo 'not match';
}




}








?>