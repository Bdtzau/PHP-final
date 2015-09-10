<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Login</title>
</head>
<body>

	<form action="includes/process_login.php" method="POST">
		<input name="email" type="text" placeholder="email"><br />
		<input name="password" type="text" placeholder="password">
		<input type="submit" value="Login">
		<a href="includes/register.php">Register</a>
	</form>
	
</body>
</html>