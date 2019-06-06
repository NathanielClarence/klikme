<?php
	include "koneksi.php";
	session_start();
?>

<!DOCTYPE html>
<html>
<head>
	<title>KlikMe.com - Klik me and see what I can do for you~</title>
	<link rel="stylesheet" type="text/css" href="style/style.css">
	<link rel="stylesheet" type="text/css" href="font-awesome/css/font-awesome.css"/>
	<script type="text/javascript" src="js/jquery-3.1.1.min.js"></script>
	<script type="text/javascript" src="js/js.js"></script>

	<script type="text/javascript">
		$(document).ready(function(){
			<?php 
			if (isset($_SESSION['username']) && isset($_SESSION['login'])){ 
				if ($_SESSION['login'] == true){
					if($_SESSION['username'] != 'admin'){ ?>
						$("#user").removeClass("none");
						$("#signIn").addClass("none");
					<?php }
					else if($_SESSION['username'] == 'admin'){ ?>
						$("#admin").removeClass("none");
						$("#user").removeClass("none");
						$("#user").addClass("none");
						$("#signIn").addClass("none");
					<?php }
					else{ ?>
						$("#user").addClass("none");
						$("admin").addClass("none");
						$("signIn").removeClass("none");
					<?php }
				} 
			}?>
		});
	</script>
</head>
<body>
	<div class="header">
		<?php if (isset($_SESSION['username']) && isset($_SESSION['login'])){
		if ($_SESSION['login'] == true){ ?>
		<h1><a href="index2.php" style="text-decoration: none; color: black;">Klik<span style="color:red;">Me</span><span style="font-size: 20px";>.com</span></a></h1>
		<?php } 
			} else { 
		?>
		<h1><a href="index.php" style="text-decoration: none; color: black;">Klik<span style="color:red;">Me</span><span style="font-size: 20px";>.com</span>
		</a></h1>
		<?php } ?>
		<div class="container">
			<div class="nav">
				<div class="dropdown">
					<button id="dropbtn" class="dropbtn">Category</button>
	  				<div id="myDropdown" class="dropdown-content">
					    <a href="hardware.php">Hardware</a>
					    <a href="software.php">Software</a>
					    <a href="programming.php">Programming</a>
				  	</div>
				</div>
			</div>
			<div class="search">
				<?php 
					$icon = mysqli_fetch_assoc(mysqli_query($conn, "SELECT * from icon where id_icon = 12"));
				?>
				<form action="search.php" method="get">
					<input type="text" name="search" placeholder="search" id="search">
					<button type="submit" name="btnSearch" id="btnSearch"><img src="<?php echo $icon['url'];?>" class="icon"></button>

				</form>
			</div>
			<div class="login none" id="user">
				<div class="dropdown">
					<?php if (isset($_SESSION['username']) && isset($_SESSION['login'])){ 
						$sql = "SELECT * from user where username like '".$_SESSION['username']."'";
						$res = mysqli_query($conn, $sql);
						$data = mysqli_fetch_assoc($res);
					?>
					<img src="<?php echo $data['user_pict'];?>" id="user">
					<button id="dropbtn2" class="dropbtn"><?php echo $_SESSION['username']; ?></button>
	  				<div id="myDropdown2" class="dropdown-content">
					    <a href="editProfile.php?id=<?php echo $data['id_num'];?>">My Profile</a>
					    <a href="addPost.php?id=<?php echo $data['id_num'];?>">My Post</a>
					    <a href="logout.php">Sign Out</a>
				  	</div>
				</div>
			</div>
			<div class="login none" id="admin">
				<div class="dropdown">
					<img src="<?php echo $data['user_pict'];?>" id="admin">
					<button id="dropbtn3" class="dropbtn"><?php echo $_SESSION['username'];?></button>
	  				<div id="myDropdown3" class="dropdown-content">
					    <a href="editProfile.php?id=<?php echo $data['id_num'];?>">My Profile</a>
					    <a href="addPost.php?id=<?php echo $data['id_num'];?>">My Post</a>
					    <a href="management.php?id=1">Management</a>
					    <a href="logout.php">Sign Out</a>
				  	</div>
				  	<?php } ?>
				</div>
			</div>
			<div class="login" id="signIn">
				<div class="dropdown">
					<img src="img/propic.png" id="pictSignIn">
					<button id="btnSignIn" class="dropbtn" onclick="myFunc()">Sign In</button>
	  				<div id="contextSignIn" class="dropdown-content">
					   	<form action="login.php" method="post">
					   		<?php $_SESSION['page'] = $_SERVER['REQUEST_URI']; ?>
							<h3>Sign In</h3>
							<label>Username  / Email: </label> <br>
							<input type="text" name="username" placeholder="your username here"> <br><br>
							<label>Password :</label> <br>
							<input type="Password" name="password" placeholder="your password here"> <br><br>
							<input type="submit" name="login" value="Login" class="button"> <br>
						</form>
						<p style="text-align: center;">Belum punya akun ? <a href="signUp.php" id="signUp">Sign Up</a></p>
				  	</div>
				</div>
			</div>
		</div>
	</div>
	<div class="paddingHeader"></div>

<script>
	var button = document.getElementById("dropbtn");
	var button2 = document.getElementById("dropbtn2");
	var button3 = document.getElementById("dropbtn3");
	var context = document.getElementById("myDropdown");
	var context2 = document.getElementById("myDropdown2");
	var context3 = document.getElementById("myDropdown3");
	
	var signIn = document.getElementById("btnSignIn");
	var form = document.getElementById("contextSignIn");

	button.onclick = function() {
	    context.classList.toggle("show");
	}

	button.onmouseover = function(){
		context.classList.toggle("show");
	}

	button2.onclick = function() {
	    context2.classList.toggle("show");
	}

	button2.onmouseover = function(){
		context2.classList.toggle("show");
	}

	button3.onclick = function() {
	    context3.classList.toggle("show");
	}

	button3.onmouseover = function(){
		context3.classList.toggle("show");
	}

	function myFunc(){
		form.classList.toggle("show");
	}

	window.onclick = function(event){
	    if (!event.target.matches('.dropbtn')) {

	    var dropdowns = document.getElementsByClassName("dropdown-content");
	    var i;
	    for (i = 0; i < dropdowns.length; i++) {
	      var openDropdown = dropdowns[i];
	      if (openDropdown.classList.contains('show')) {
	        openDropdown.classList.remove('show');
	      }
	    }
	  }
	}

	// context.onmouseover = function(){
	// 	context.classList.toggle("show");
	// }

	// window.onmouseover = function(event){
	//     if (!event.target.matches('.dropbtn')) {
	//     	var dropdowns = document.getElementsByClassName("dropdown-content");
	//     	var i;
	//    		for (i = 0; i < dropdowns.length; i++) {
	//       		var openDropdown = dropdowns[i];
	//       		if (openDropdown.classList.contains('show')) {
	//         		openDropdown.classList.remove('show');
	//       		}
	//     	}
	//   	}
	// }
</script>
</body>
</html>