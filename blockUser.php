<?php
	include "koneksi.php";
	session_start();
	$id = $_GET['id'];

	$sql = "UPDATE user SET block_sts = 1 WHERE id_num=".$id;

	if(mysqli_query($conn, $sql)){
		header("location: management.php?id=1");
	}
	else{
		echo "gagal";
	}
?>