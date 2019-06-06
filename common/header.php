<?php
	include "updt_session.php";
	session_start();
?>

<!DOCTYPE html>
<html>
<head>
	<title>KlikMe.com - Klik me and see what I can do for you~</title>
	<link rel="stylesheet" type="text/css" href="style/style.css">
	<script type="text/javascript" src="js/jquery-3.1.1.min.js"></script>
	<script type="text/javascript" src="js/js.js"></script>

	<script type="text/javascript">
		$(document).ready(function(){
			<?php if ($_SESSION['login'] == true){
				if($_SESSION['username'] != 'admin'){ ?>
					$("#user").removeClass("hidden");
				<?php }
				else{ ?>
					$("#admin").removeClass("none");
					$("#user").removeClass("hidden");
					$("#user").addClass("none");
				<?php }
			}?>
		});
	</script>
</head>
<body>
	<div class="header">
		<?php if ($_SESSION['login'] == true){?>
		<h1><a href="index2.php" style="text-decoration: none; color: black;">Klik<span style="color:red;">Me</span><span style="font-size: 20px";>.com</span></a></h1>
		<?php } else { ?>
		<h1><a href="index.php" style="text-decoration: none; color: black;">Klik<span style="color:red;">Me</span><span style="font-size: 20px";>.com</span>
		</a></h1>
		<?php } ?>
		<div class="container">
			<div class="nav">
				<select onchange="this.options[this.selectedIndex].value && (window.location = this.options[this.selectedIndex].value);">
					<option>Category</option>
					<option value="hardware.php">Hardware</option>
					<option value="software.php">Software</option>
					<option value="programming.php">Programming</option>
				</select>	
			</div>
			<div class="search">
				<input type="text" name="search" placeholder="search">
				<button id="btnSearch">Search</button>
			</div>
			<div class="login hidden">
				<img src="img/propic.png" id="user">
				<select onchange="this.options[this.selectedIndex].value && (window.location = this.options[this.selectedIndex].value);">
					<option><?php echo $_SESSION['username']; ?></option>
					<option value="editProfile.php">My Profile</option>
					<option value="addPost.php">My Post</option>
					<option value="logout.php">Log Out</option>
				</select>
			</div>
			<div class="login none">
				<img src="img/propic.png" id="admin">
				<select onchange="this.options[this.selectedIndex].value && (window.location = this.options[this.selectedIndex].value);">
					<option>Admin</option>
					<option value="editProfile.php">My Profile</option>
					<option value="addPost.php">My Post</option>
					<option value="management.php">Management</option>
					<option value="logout.php">Log Out</option>
				</select>
			</div>
		</div>
	</div>
</body>
</html>