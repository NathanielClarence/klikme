<?php
	include "koneksi.php";

	$id = $_GET['id'];
	$user = '%'.$_GET['user'].'%';
	$comment = $_GET['comment'];
	$context = $_POST['context'];

	$q = "SELECT * from user where username like '$user'";
	$r = mysqli_query($conn, $q);
	$d = mysqli_fetch_assoc($r);

	$id_num = $d['id_num'];

	$sql = "INSERT into replycomment (id_topic, id_user, comment_id, context) values ('$id', '$id_num', '$comment', '$context')";
	if(mysqli_query($conn, $sql)){
		header("location: article.php?id=".$id);
	}
	else{
		echo "gagal";
	}
?>