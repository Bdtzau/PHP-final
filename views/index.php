<?php 
$query = "SELECT comments.*, from_user.email AS from_email, to_user.email AS to_email 
FROM comments 
INNER JOIN users AS from_user ON comments.posted_by_userid=from_user.id
INNER JOIN users AS to_user ON comments.posted_to_userid=to_user.id
";
$result = $connection->query($query);



if ($result->num_rows > 0) {
	// We have data in our database
	// echo "<pre>";
	while ($row = mysqli_fetch_array($result)) {
		// print_r($row);
		echo "<p>From: ". $row['from_email'] . "</p>";
		echo "<p>To: ". $row['to_email'] . "</p>";
		echo "<p>". $row['comment'] . "</p><br />";
	}
} else {
	echo "There are no users in the users database.";
}
?>