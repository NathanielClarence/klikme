<?php
include 'koneksi.php';

$id = $_GET['id'];

session_start();

if($_SESSION['login']==true){
	if(isset($_POST['submit'])){
		$title = $_POST['title'];
		$content = $_POST['content'];
		$category = $_POST['category'];

		if(!empty($attach=$_FILES['pict']['name'])){
			if(!is_executable($attach)){
				if(move_uploaded_file($_FILES['file']['tmp_name'], $link="files/".$attach)){

					$ins = "INSERT INTO attachment('name') VALUES ('".$attach."')";
					mysqli_query($conn, $ins);

					$todb = "SELECT * FROM attachment WHERE name = ".$attach;
					$res = mysqli_fetch_assoc(mysqli_query($conn, $todb));

					$newname= "files/".$res['attach_id'].''.filetype($attach);
					rename($attach, $newname);

					mysqli_query($conn, "UPDATE attachment SET name = '".$newname."' WHERE attach_id =".$res['attach_id']);
					
					$sql = "INSERT INTO topic(user_id, total_views, title, content, category, deleted, attach_id, picture) VALUES ('".$id."', 0, '".$title."','".mysql_real_escape_string($content)."', '".$category."', 0, '".$res['attach_id']."', '".$res['attach_id']."')";

					//mysqli_query($conn, $sql);
					//rename($link, "files/".$res['attach_id'])
				}else{
					echo "failed to upload";
				}
			}else{
				echo "file cannot be executable";
			}
		}else{
			$sql = "INSERT INTO topic(user_id, total_views, title, content, category, deleted) VALUES ('".$id."', 0, '".$title."','".mysql_real_escape_string($content)."','".$category."', 0)";
		}


		//$sql = "INSERT INTO topic(`total_views`, `title`, `content`, `category`, `category2`, `category3`, `deleted`) VALUES ('0','".$title."','".$content."','".$category"','".$category2."','".$category3."','0')";
		//$sqladd = "INSERT INTO `follow`(`user_id`, `topic_id`) VALUES ([value-1],[value-2])"

		if(mysqli_query($conn, $sql)){
			$_SESSION['postid'] = mysqli_fetch_assoc(mysqli_query($conn,"SELECT * FROM topic WHERE title='".$title."' AND content='".$content."'"))['topic_id'];
			mysqli_query($conn, "INSERT INTO `follow`(`user_id`, `topic_id`) VALUES ('".$_SESSION['id']."','".$_SESSION['postid']."'");
			header("location: addPost.php?id=".$id);
		}
	}
}
?>