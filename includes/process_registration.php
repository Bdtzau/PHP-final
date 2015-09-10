<?php
include("../config/database.php");

//debug
echo "<pre>";
print_r($_POST);

// ternary
$first_name = (isset($_POST["fname"])) ? $_POST["fname"] : "";
$last_name = (isset($_POST["lname"])) ? $_POST["lname"] : "";
$email = (isset($_POST["email"])) ? $_POST["email"] : "";
$password = (isset($_POST["password"])) ? md5($_POST["password"]) : false;
$pic = (isset($_POST["pic"])) ? $_POST["pic"] : "";

//error handling
if (!$password) {
	die("Please enter password");
}
if ($email === "") {
	die("Please enter email");
}

$check_user_collision = "SELECT COUNT(*) FROM users WHERE email = '".$email."'";
$result = $connection->query($check_user_collision);
if ($result === FALSE) {
	die("you had a mysql error");
} else {
	print_r($result);

	while($row = mysqli_fetch_row($result)) {
		if ($row[0]) {
			die("user email already in database");
		}
	}
	
}

// sql logic
$query = "INSERT INTO `users` (email, password, first_name, last_name, profile_pic) VALUES ('$email', '$password', '$first_name', '$last_name', '$pic')";

if ($connection->query($query) === FALSE) {
	die("you had a mysql error");
} else {
	$last_inserted_id = $connection->insert_id;
	// $affected_rows = $connection->affected_rows;
	// print_r($connection);
	// echo "The user inserted was user ID: " . $last_inserted_id;
	include("process_login.php");
}


?>