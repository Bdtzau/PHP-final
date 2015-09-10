<?php
include('config.php');

$connection = mysqli_connect(MYSQL_SERVER, MYSQL_USERNAME, MYSQL_PASSWORD, MYSQL_DATABASE);

if (mysqli_connect_errno()) {
	echo "MySQL has error: " . mysqli_connect_errno();
}
?>