<?php
	include "koneksi.php";
	session_start();
	$id = $_GET['id'];

	$sql = "UPDATE user SET block_sts=1 WHERE id_num=".$id;

	mysqli_query($conn, $sql);
?>