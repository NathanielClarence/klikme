<?php
	include "koneksi.php";
	session_start();
	$id = $_GET['id'];

	$sql = "UPDATE topic SET block = 1 WHERE topic_id=".$id;

	if (mysqli_query($conn, $sql)){
		header("location: article.php?id=".$id);
	}
	else{
		echo "gagal";
	}
	
?>