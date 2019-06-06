<?php
	include "koneksi.php";

	$idTopic = $_POST['idTopic'];
	$idUser = $_POST['idUser'];
	$reason = $_POST['report'];

	$sql = "INSERT into report (id_topic, id_user, reason) values ('$idTopic', '$idUser', '$reason')";
	if ($res = mysqli_query($conn, $sql)){
		header("location: article.php?id=".$idTopic);
	}
?>