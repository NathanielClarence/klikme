<?php
	include "koneksi.php";

	/*if(isset($_SESSION["id"])){
		if(!isset($_SESSION["CREATED"])){
			$_SESSION["CREATED"]=time();
		}
		else if (time()-$_SESSION["CREATED"]<7200) {
			session_regenerate_id(true);
			$_SESSION["CREATED"]=time();
		}
		else{
			session_regenerate_id(false);
			//session_destroy();
			include "logout.php";
			header('Location: index.php');
		}
	}
	else{
		session_regenerate_id(false);
		//session_destroy();
		include "logout.php";
		header('Location: index.php');
	}*/

	
?>