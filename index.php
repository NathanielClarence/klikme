<?php
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
			<h2>Trending Topic</h2>
				<?php 
					$sql = "SELECT title, topic_id, picture, substring(content, 1, 150) as content from topic where star >=  50 and deleted = 0 and block = 0 limit 3";
					$res = mysqli_query($conn, $sql);
					while($data = mysqli_fetch_assoc($res)){
				?>
				<div class="content">
					<div class="pict">
						<img src="<?php echo $data['picture'];?>">
					</div>
					<div class="text">
						<select id="admin" class="hidden">
							<option></option>
							<option>Block</option>
							<option>Delete</option>
						</select>
						<h3><?php echo $data['title']; ?></h3>
						<?php echo $data['content'];?>.....
						<br><br>
						<a href="article.php?id=<?php echo $data['topic_id'];?>">Read More</a>
					</div>
				</div>
				<?php } ?>
			</div>
			<br><br>
			<div class="border">
				<h2>Popular</h2>
				<?php 
					$sql = "SELECT title, topic_id, picture, substring(content, 1, 150) as content from topic where total_views >= 50 and deleted = 0 and block = 0 limit 5";
					$res = mysqli_query($conn, $sql);
					while($data = mysqli_fetch_assoc($res)){
				?>
				<div class="content">
					<div class="pict">
						<img src="<?php echo $data['picture'];?>">
					</div>
					<div class="text">
						<select id="admin" class="hidden">
							<option></option>
							<option>Block</option>
							<option>Delete</option>
						</select>
						<h3><?php echo $data['title'];?></h3>
						<?php echo $data['content']; ?>.....
						<br><br>
						<a href="article.php?id=<?php echo $data['topic_id'];?>">Read More</a>
					</div>
				</div>
				<br>
				<?php }?>
			</div>
		</div>
		<div class="aside">
			<form action="login.php" method="post">
				<?php $_SESSION['page'] = "index2.php"; ?>
				<h1>Sign In</h1>
				<label>Username  / Email: </label> <br>
				<input type="text" name="username" placeholder="your username here"> <br><br>
				<label>Password :</label> <br>
				<input type="Password" name="password" placeholder="your password here"> <br><br>
				<input type="submit" name="login" value="Login" class="button"> <br>
			</form>
			<p style="text-align: center;">Belum punya akun ? <a href="signUp.php">Sign Up</a></p>
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