<?php
	include "koneksi.php";
	session_start();
	$id = $_GET['id'];

	$sql = "UPDATE topic SET deleted=1 WHERE topic_id=".$id;

	if(mysqli_query($conn, $sql)){
		header("location:index2.php");
	}
	else{
		echo "gagal";
	}
?>