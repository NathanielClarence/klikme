<?php
	include "koneksi.php";

	$id = $_GET['id'];
	$idTopic = $_GET['idTopic'];

	$title = $_POST['title'];
	$content = $_POST['content'];
	$category = $_POST['category'];

	function test_input($data) {
		$data = trim($data);
		$data = stripslashes($data);
		$data = htmlspecialchars($data);
		return $data;
	}

	if (!empty($_FILES['pict']['name'])){
		$pict = $_FILES['pict']['name'];
		$uploadfile = "images/".$pict;

		if ($_FILES['pict']['type'] == "image/jpeg" || $_FILES['pict']['type'] == "image/png"){
			if(move_uploaded_file($_FILES['pict']['tmp_name'], $uploadfile)){

			}
			else{
				echo "not JPEG / PNG";
			}
		}

		$sql = "UPDATE `topic` set title = '".$title."', content = '".mysql_real_escape_string($content)."', category = '".$category."', picture = '".$uploadfile."' where topic_id = ".$idTopic;
		if(mysqli_query($conn, $sql)){
			header("location:addPost.php?id=".$id);
		}
		else{
			echo "gagal1".mysqli_error($conn);
		}
	}
	else{
		$q = "SELECT * from topic where topic_id = ".$idTopic;
		$r = mysqli_query($conn, $q);
		$d = mysqli_fetch_assoc($r);
		$picture = $d['picture'];

		$sql = "UPDATE `topic` set title = '".$title."', content = '".mysql_real_escape_string($content)."', category = '".$category."', picture = '".$picture."' where topic_id = '".$idTopic."'";
		if(mysqli_query($conn, $sql)){
			header("location:addPost.php?id=".$id);
		}
		else{
			echo "gagal2".mysqli_error($conn);;
		}
	}
?>