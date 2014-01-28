<!doctype html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Document</title>
</head>
<body>
	

	<form action="register.php" method="POST" name="registerForm">
		
		login
		<input id="login" type="text" name="login"  pattern="[a-zA-Z0-9]{2,64}" required>
		email
		<input id="email" type="email" name="email" pattern=".{6,}" required>

		password
		<input id="password" type="password" name="password" pattern=".{6,}" required>

		repeat password
		<input id="repeatPassword" type="password" name="repeatPassword" required>

		register
		<input type="submit" name="register" value="register" />



	</form>


</body>
</html>