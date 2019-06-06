<?php
	include "koneksi.php";
	session_start();
	$id = $_GET['id'];

	$sql = "UPDATE topic SET deleted=0 WHERE topic_id=".$id;

	if(mysqli_query($conn, $sql)){
		header("location: management.php?id=1");
	}
	else{
		echo "gagal";
	}
?>