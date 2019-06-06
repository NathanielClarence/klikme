<?php
	mysqli_query($conn, "DELETE FROM `follow` WHERE user_id ='".$_SESSION['id']."' AND topic_id = '".$_GET['postid']."'");
?>