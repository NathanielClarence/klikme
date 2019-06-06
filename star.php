<?php
	include "koneksi.php";

	session_start();

	$id = $_GET['id'];

	$sql = "UPDATE topic set star = star + 1 where topic_id = ".$id;
	if ($res = mysqli_query($conn, $sql)){
		$_SESSION['msg'] = "Giving star success";
		header("location: article.php?id=".$id);
	}
?>
