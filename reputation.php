<?php
	//include "koneksi.php"
	//session_start();

	if(isset($_GET['id'])){
		$sql = "SELECT reputation, voters FROM user WHERE id_num=".$_GET['id'];
	}else{
		$sql = "SELECT reputation, voters FROM user WHERE id_num=".$_SESSION['id'];
	}

	$res=mysqli_fetch_assoc(mysqli_query($conn, $sql));

	$repu = "reputation/5stars.png";//link lokal gambar asli
	$data = getimagesize($repu); //get image size
	$width = $data[0];
	$height = $data[1];
	
	$repu = imagecreatefrompng($repu);
	//5 = 100%
	if($res['voters']!=0){
		$avg = $res['reputation']/$res['voters'];
		$tamp = $avg/5;
	}else{
		$tamp=0;
	}

	$width = round($width*$tamp,0);

	if($width == 0)
		$width=1;
	$rep = imagecrop($repu, ['x' => 0, 'y' => 0, 'width' => $width, 'height' => $height]);
	$savePath = "reputation/Repu_".$_GET['id'].".png";
	//session_start();
	$_SESSION['percent']=$tamp*30;
	$_SESSION["dlLink"] = $savePath;
	$_SESSION["reps"] = round(5*$tamp,1);
	imagepng($rep, $savePath);
	//imagedestroy($);
?>