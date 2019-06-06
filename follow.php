<?php
	mysqli_query($conn, "INSERT INTO `follow`(`user_id`, `topic_id`) VALUES ('".$_SESSION['id']."','".$_GET['postid']."'");
?>