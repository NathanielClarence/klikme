<?php
	include "koneksi.php";

	$id = $_GET['id'];
	$user = $_GET['user'];
	$context = $_POST['context'];

	$sql = "INSERT into comment (context, id_user, id_topic) values ('$context', '$user', '$id')";

	if(mysqli_query($conn, $sql)){
		header("location: article.php?id=".$id);
	}
	else{
		echo "gagal";
	}
?>