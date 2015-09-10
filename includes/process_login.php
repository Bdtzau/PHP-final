<?php

include("../config/session.php");
include("../config/database.php");

// echo "<pre>";
// print_r($_POST);

if (isset($_SESSION['loggedIn'])) {
	header('location: ../index.php');
	// die("You are already logged in");
}

$email = isset($_POST["email"]) ? $_POST["email"] : FALSE;
$password = isset($_POST["password"]) ? md5($_POST["password"]) : FALSE;

if (!$email || !$password) {
	echo "You must enter an email and password";
}

$query = "SELECT * FROM users"; //SELECT COUNT(*) FROM users WHERE email = '".$email."'"
$result = $connection->query($query);
$_SESSION['loggedIn'] = FALSE;

if ($result === FALSE) {
	die("you had a mysql error");
} else {
	// print_r($connection);
	while($row = mysqli_fetch_array($result)) {
		// print_r($row);
		if ($row["email"] === $email && $row["password"] === $password) {
			$_SESSION['loggedIn'] = TRUE;
			$_SESSION['user'] = array(
					'id'			=> $row['id'],
					'email'			=> $row['email'],
					'first_name'	=> $row['first_name'],
					'last_name'		=> $row['last_name'],
					'profile_pic'	=> $row['profile_pic'],
					'cover_pic'		=> $row['cover_pic'],
				);
			break;
		}
	}

	// echo "Logged in? " . $_SESSION['loggedIn'];

	if ($_SESSION['loggedIn']) {
		header('location: ../index.php');
	} else {
		echo "Incorrect username or password. <a href='login.php'>Click here</a> to try again.";
	}
}

// echo "The user inserted was user ID: " . $last_inserted_id;

?>