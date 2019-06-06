<?php
	include "koneksi.php";

	//$excUser=$_SESSION['excUser'];
	//$excEmail=$_SESSION['excEmail'];

	//$_SESSION['excUser']=true;
	//$_SESSION['excEmail']=true;
	//$_SESSION['login']=NULL;
	
	//session_destroy();
	//session_start();
	if(isset($_SESSION['login'])){
		if($_SESSION['login']==true){
			header("location:index2.php");
		}
	}else{
		$_SESSION['login']=false;
	}

	if(isset($_POST["signup"])){
		$uname=$_POST["uname"];
		$password = $_POST["pwd"];
		$fname=$_POST["fname"];
		$mname=$_POST["mname"];
		$lname=$_POST["lname"];
		$email=$_POST["email"];
		$bday = $_POST["bday"];

		$ckinput = "SELECT username, email FROM user WHERE username='".$uname."' OR email='".$email."'";
		$res = mysqli_fetch_assoc(mysqli_query($conn,$ckinput));
		
		//echo "<script>run done</script>";
		
		if ($res["email"]==$email) {
			# code...
			$_SESSION['excEmail']=true;
			if($res["username"]==$uname){
				$_SESSION['excUser']=true;
				header("location:signUp.php");
			}
			header("location:signUp.php");
		} else {
			# code...
			if($res["username"]==$uname){
			//	$excUser=true;
				$_SESSION['excUser']=true;
				header("location:signUp.php");
			}else{
				$insql = "INSERT INTO user (username, password, first_name, mid_name, last_name, birthday, email, block_sts, user_rank, reputation, voters, votetoday) VALUES ('".$uname."',password('".$password."'),'".$fname."','".$mname."','".$lname."','".$bday."','".$email."','0','1','0','0','0')";

				$run = mysqli_query($conn, $insql);

				if(mysqli_query($conn, $insql)){
					//echo "<script>alert('Inserted');</script>";
					//header("location:index.php");
				}else{
					//
				}

				session_destroy();



				$fetch = mysqli_fetch_assoc(mysqli_query($conn, "SELECT id_num, first_name, last_name WHERE 'username' = '".$uname."'"));
				session_start();
				$_SESSION['id'] = $fetch['id_num'];
				$_SESSION['login'] = true;
				$_SESSION['username'] = $uname;
				$_SESSION['fullname'] = $fetch['first_name']." ".$fetch['last_name'];
				
				if (!isset($_SESSION['page'])){
					header("location:index2.php");
				}
				else{
					header("location:index2.php");
				}
			}
		}
		
	}else{
		// echo "<script>alert('BBBB');</script>";
	}
	//session_destroy();
	include "header.php";
?>

<!DOCTYPE html>
<html>
<head>
	
</head>
<body>
	<div class="flex-container">
		<div class="article">
			<div class="border">
				<h1>Welcome</h1>
				<div class="text">
					Lorem ipsum dolor sit amet, consectetur adipiscing elit. Quisque pellentesque cursus magna ac finibus. Nulla eget tristique nisl. In pharetra justo vel laoreet rhoncus. Praesent id venenatis elit. Duis elementum magna quis tellus interdum congue. Integer dictum purus ut posuere porta. Sed blandit nibh eget orci varius hendrerit. Proin posuere posuere dolor. Nunc laoreet sapien ut urna aliquam, ac mattis elit volutpat. Vestibulum ante ipsum primis in faucibus orci luctus et ultrices posuere cubilia Curae;
				</div>
			</div>
		</div>
		<div class="asideSignIn">
			<h2>Sign Up</h2>
			<form action="signUp.php" method="post">
				<input type="text" name="uname" placeholder="Username" id="uname" style="width: 400px;" required> 
				<?php 
					if(isset($_SESSION['excUser'])){
						echo "<h5 style='color:red'>username already used</h5>";
						session_destroy();
						//$_SESSION['excUser']=false;
					} 
				?>
				<div id="pesanUname"></div> <br>
				<input type="text" name="fname" placeholder="First Name" id="name"style="width: 400px;" required>
				<input type="text" name="mname" placeholder="Middle Name" id="name"style="width: 400px;">
				<input type="text" name="lname" placeholder="Last Name" id="name"style="width: 400px;" required>
				<div id="pesanName"></div> <br>
				<input type="text" name="email" placeholder="Email" id="email" style="width: 196px;" required>
				<?php 
					if(isset($_SESSION['excEmail'])){
						echo "<h5 style='color:red'>email already used</h5>";
						session_destroy();
						// $_SESSION['excEmail']=false;
					} 
				?>
				<input type="text" name="remail" placeholder="Retype Email" id="remail" style="width: 196px;" required> 
				<br>
				<div id="pesanEmail" style="display: inline;"></div>
				<br>
				<input type="password" name="pwd" placeholder="Password" id="pwd" style="width: 196px;" required>
				<input type="password" name="repwd" placeholder="Retype Password" id="repwd" style="width: 196px;" required>
				<br>
				<div id="pesanPwd" style="display: inline;"></div>
				<br><br>
			    <label>Birthday :</label>
			    <input type="date" name="bday" required>
			    <br><br>
<!-- <<<<<<< HEAD -->
			    <button type="submit" name="signup" class="button">Sign Up</button>
<!-- ======= -->
			    <!-- <button name="signup" type="submit">Sign Up</button> -->
<!-- >>>>>>> 70ac514c8be4cd89f35d90b86a50a942115091ec -->
			</form>
		</div>
	</div>
	<div class="footer">
		<h4>Contact Us:</h4>
		<?php 
			$icon = mysqli_fetch_assoc(mysqli_query($conn, "SELECT * from icon where id_icon = 2"));
		?>
		<img src="<?php echo $icon['url'];?>" class="icon">KlikMe_com
		<?php 
			$icon = mysqli_fetch_assoc(mysqli_query($conn, "SELECT * from icon where id_icon = 3"));
		?>
		<img src="<?php echo $icon['url'];?>" class="icon left">@klikme_com
		<?php 
			$icon = mysqli_fetch_assoc(mysqli_query($conn, "SELECT * from icon where id_icon = 4"));
		?>
		<img src="<?php echo $icon['url'];?>" class="icon left">klikme_com
	</div>
</body>
</html>