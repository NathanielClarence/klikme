<?php
	include "koneksi.php";

	$user = $_POST['username'];
	$pass = $_POST['password'];//md5(sha1());

	
	if (strpos($user, '@'!==false)){
		$sql = "SELECT block_sts, password FROM user WHERE email LIKE '".$user."' AND password = password('".$password."')";
	}
	else{
		$sql = "SELECT block_sts, password FROM user WHERE username LIKE '".$user."' AND password = password('".$password."')";
	}

	$res = mysqli_fetch_assoc(mysqli_query($conn, $sql));

	if ($res['block_sts'] == 0){
		//if ($pass == $res['password']){
			$fetch = mysqli_fetch_assoc(mysqli_query($conn, "SELECT id_num, first_name, mid_name, last_name WHERE 'username' = '".$user."'"));
			session_start();
			$_SESSION['id'] = $fetch['id_num'];
			$_SESSION['login'] = true;
			$_SESSION['username'] = $user;
			$_SESSION['fullname'] = $fetch['first_name']." ".$fetch['mid_name']." ".$fetch['last_name'];
			if (!isset($_SESSION['page'])){
				header("location:index2.php");
			}
			else{
				header("location:".$_SESSION['page']);
			}
		//}
		/*else{
			echo"<script>alert('Username / Email or Password is incorrect')</script>";
			header("location:index.php");
		}*/
	}
	else{
		echo "<script>alert('You are blocked')</script>";
	}
?>