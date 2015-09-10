<?php 
include("../config/session.php");
include("../config/database.php");

$comment = (isset($_POST["comment"])) ? $_POST["comment"] : "";
$recipient = (isset($_POST["recipient"])) ? $_POST["recipient"] : null;
// $timestamp = CURRENT_TIMESTAMP;


if (isset($_SESSION['loggedIn']) && $_SESSION['loggedIn']) {
	$user = isset($_SESSION['user']) ? $_SESSION['user'] : FALSE;

	if ($comment === "") {
		die("Please enter a comment before submitting");
	} else {
		$query = "INSERT INTO `comments` (comment, posted_by_userid, posted_to_userid, time_posted) VALUES ('$comment', '$user[id]', '$recipient', CURRENT_TIMESTAMP)";

		if ($connection->query($query) === FALSE) {
			die("you had a mysql error");
		} else {
			header('Location: ../index.php?page=profile&id='.$recipient);
		}
	}	
} else {
	echo "Please log in to post a comment";
}


?>