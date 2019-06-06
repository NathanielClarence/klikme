<?php
	include "koneksi.php";
	session_start();
	$id = $_GET['id'];
	$comment = $_GET['comment'];

	$sql = "UPDATE comment SET block=1 WHERE comment_id=".$comment;

	if(mysqli_query($conn, $sql)){
		//echo "true";
		header("location: article.php?id=".$id);
	}
	else{
		echo "gagal";
	}
?>