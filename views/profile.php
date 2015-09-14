<?php

if (isset($_GET['id'])) {
	$profile_id = $_GET['id'];
	$query = "SELECT * FROM users WHERE id=$profile_id";
	$result = $connection->query($query);
	while ($row = mysqli_fetch_array($result)) {
		// print_r($row);
		if ($row['id'] == $profile_id) {
			$profile = $row;
			break;
		}
	}
	if (!$profile) {
		die("Profile does not exist");
	}
} else {
	die("No profile set in url");
}

include("includes/submit_comment.php");

$query = 	"SELECT comments.*, users.email FROM comments 
			INNER JOIN users ON comments.posted_by_userid=users.id
			ORDER BY time_posted DESC";

$result = $connection->query($query);

if ($result->num_rows > 0) {
	// We have data in our database
	echo "<h2>Recent Comments:</h2>";
	while ($row = mysqli_fetch_array($result)) {
		// print_r($row);
		if ($row['posted_to_userid'] == $profile['id']) {
			echo "<div><p>". $row['comment'] . "</p> <p>posted by: ".$row['email']."</p> <p>".$row['time_posted']."</p><br /></div>";
		}
	}
} else {
	echo "There are no users in the users database.";
}

?>