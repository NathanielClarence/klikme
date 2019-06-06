<?php
	include "koneksi.php"
	session_start();

	$id = $_GET['id'];
	$val = $_GET['value'];

	$sql = "UPDATE user SET reputation= reputation+".$val.", voters = voters+1 WHERE id_num=".$id;

	mysqli_query($conn, $sql);
?>