<?php 

$user_query = "SELECT * FROM users";
$users_result = $connection->query($user_query);

if ($users_result->num_rows > 0) {
	// We have data in our database
	// echo "<pre>";
	echo "<div class='profiles'>";
	echo "<h2>Browse Users:</h2><br />";
	while ($row = mysqli_fetch_array($users_result)) {
		// print_r($row);
		echo "<div class='profiles'>";
		echo "<p>Email: ". $row['email'] . "</p>";
		echo "<a href='index.php?page=profile&id=" .$row["id"]."'";
		if($row['first_name'] != "" || $row['last_name'] != "") {
			echo "<p>Name: ". $row['first_name'] . "&nbsp;" . $row['last_name'] . "</p><br />";
		} else {
			echo "<p>Name: Anonymous</p><br />";
		}
		echo "</a>";
		
		echo "</div>";
	}

	echo "</div>";
} else {
	echo "There are no users in the users database.";
}

$query = "SELECT comments.*, from_user.email AS from_email, to_user.email AS to_email 
FROM comments 
INNER JOIN users AS from_user ON comments.posted_by_userid=from_user.id
INNER JOIN users AS to_user ON comments.posted_to_userid=to_user.id
ORDER BY time_posted DESC
";
$result = $connection->query($query);



if ($result->num_rows > 0) {
	// We have data in our database
	// echo "<pre>";
	echo "<div class='comments'>";
	echo "<h2>Recent Comments:</h2><br />";
	while ($row = mysqli_fetch_array($result)) {
		// print_r($row);
		echo "<div>";
		echo "<p>From: ". $row['from_email'] . "</p>";
		echo "<p>To: ". $row['to_email'] . "</p>";
		echo "<p>". $row['time_posted'] . "</p>";
		echo "<p>". $row['comment'] . "</p><br />";
		echo "</div>";
	}
	echo "</div>";
} else {
	echo "There are no users in the users database.";
}
?>