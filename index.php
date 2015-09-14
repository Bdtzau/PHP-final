<?php
include("config/database.php");
include("config/session.php");
?>

<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Document</title>

	<link rel="stylesheet" href="assets/css/reset.css">
	<link rel="stylesheet" href="assets/css/styles.css">
</head>
<body>
	<header>
		<?php include('includes/header.php'); ?>
	</header>
	<?php  
		if (isset($_GET['page'])) {
			$page = $_GET['page'];
		} else {
			$page = "index";
		}


		if (file_exists("views/$page.php") ) {
			include ("views/$page.php");
		} else {
			include("views/error.php");
		}
	?>
</body>
</html>