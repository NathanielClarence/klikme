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
			<h2>New Added</h2>
				<?php 
					$time = time();
					$day =  date("Y-m-d", $time);
					$sql = "SELECT title, topic_id, picture, substring(content, 1, 150) as content from topic where deleted = 0 and block = 0 and posted like '%".$day."%'";
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
						<img src="<?php echo $data['picture']; ?>">
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
			<h2>Hot Review</h2>
			<?php 
				$sql = "SELECT title, topic_id, picture, substring(content, 1, 150) as content from topic where star >=  10 and star < 50 and deleted = 0 and block = 0 limit 5";
				$res = mysqli_query($conn, $sql);
				while($data = mysqli_fetch_assoc($res)){
			?>
			<div class="context">
				<select id="adminMenu5" class="admin hidden">
					<option></option>
					<option>Block</option>
					<option>Delete</option>
				</select>
				<img src="<?php echo $data['picture']; ?>">
				<div class="text">
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