<?php


//do hashing to password
function do_hash($password){
	
	$md = md5($password);//hashing with md5 
	$hashFormat = sprintf("$2y$%02d$",$md);//getteing formated format of password
	$format  = md5($hashFormat);//hashing fotmated format in md5
	$cryt = crypt($password ,CRYPT_BLOWFISH);//generating password form post
	$crypted = $cryt.$md.$hashFormat.$format;//creating crypted password
	$password_hash = str_replace(array("$", "0","a"),array(".","$","0"), $crypted);//finalizating the crypted password

	return $password_hash;
}

//check password 
function checkUser($db,$password){

	$query = $db->prepare("SELECT `name` , `password` FROM `users` WHERE `password` = ? ");
	$query->bindParam(1,$password,PDO::PARAM_STR);
	$query->execute();
	$row = $query->fetch(PDO::FETCH_ASSOC);	
	$db = null;
	return $row;

}


//check insert user function
function insertUser($db,$user,$email,$password_hash){

	$query= $db->prepare("INSERT INTO `users`(`name`,`email`,`password`)
						  VALUES ( :user, :email, :password )");

	$query->bindValue(':user',$user,PDO::PARAM_STR);
	$query->bindValue(':email',$email,PDO::PARAM_STR);
	$query->bindValue(':password',$password_hash,PDO::PARAM_STR);
	$query->execute();
	$db = null;
	
	if(!$query)return false;
	else return true;

}

//check if user exists
function checkIfUserExists($db,$userName){

	$query = $db->prepare("SELECT `name` FROM `users` WHERE `name` = ? ");
	$query->bindParam(1,$userName,PDO::PARAM_STR);
	$query->execute();
	$db = null;
	$row = $query->fetch(PDO::FETCH_ASSOC);
	return $row;
}

	//check if email exists
function checkIfEmailExists($db,$email){

	$query = $db->prepare("SELECT `email` FROM `users` WHERE `email` = ? ");
	$query->bindParam(1,$email,PDO::PARAM_STR);
	$query->execute();
	$db = null;
	$row = $query->fetch(PDO::FETCH_ASSOC);
	return $row;
}

