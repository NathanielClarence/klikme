<?php
	include "koneksi.php";

	$id = $_GET['id'];
	$rep = $_GET['rep'];
	$loc = $_GET['loc'];

	switch($rep){
		case 1: $sql = "UPDATE user set voters = voters + 1, reputation = reputation - 5 where id_num = ".$id; break;
		case 2: $sql = "UPDATE user set voters = voters + 1, reputation = reputation + 1 where id_num = ".$id; break;
		case 3: $sql = "UPDATE user set voters = voters + 1, reputation = reputation + 5 where id_num = ".$id; break;
	}

	if (mysqli_query($conn, $sql)){
		session_start();
		$_SESSION['mgs'] = "Give Reputation Success";
		header("location:article.php?id=".$loc);
	}
	else{
		echo "gagal";
	}	
?>