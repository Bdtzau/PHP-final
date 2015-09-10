	<h1>Fakebook</h1>

	<?php
	if (isset($_SESSION['loggedIn']) && $_SESSION['loggedIn']) {
		$user = isset($_SESSION['user']) ? $_SESSION['user'] : FALSE;
		echo '<div class="nav">
			<a href="index.php?page=profile&id='.$user["id"].'">My Profile</a>
		</div>';
	}
	?>

	<div class="account">
		<?php
		if (isset($_SESSION['loggedIn']) && $_SESSION['loggedIn']) {
			$user = isset($_SESSION['user']) ? $_SESSION['user'] : FALSE;

			if ($user) {
				// print_r($user);
				echo "Hello, ".$user['first_name']." ".$user['last_name'];
				echo "<br />Welcome back! Your email is ".$user['email'];
			} else {
				echo "This should never happen (header.php no user)";
				include("includes/login.php");
			}
			echo 'You are already logged in. <a href="includes/logout.php">Click here</a> to log out.';
		} else {
			echo "Please log in or register";
			include("includes/login.php");
		}
		?>
	</div>

