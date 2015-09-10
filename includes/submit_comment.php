

<form action="includes/process_submit_comment.php" method="POST">
	<textarea type="text" name="comment" placeholder="Type your comment here"></textarea>
	<input type="hidden" name="recipient" value="<?php echo $profile_id ?>">
	<input type="submit" value="Post Comment">
</form>
