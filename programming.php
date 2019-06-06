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
				<h2>Programming</h2>
				<div class="contentPage1">
					<?php
						$data = mysqli_fetch_assoc(mysqli_query($conn, "SELECT substring(content, 1, 150) as content, title, picture, topic_id from topic where category = 'programming' and topic_id = 21 and deleted = 0 and block = 0"));
					?>
					<div class="pict">
						<img src="<?php echo $data['picture'];?>">
					</div>
					<div class="text">
						<h3><?php echo $data['title'];?></h3>
						<?php echo $data['content'];?>.....
						<br><br>
						<a href="article.php?id=<?php echo $data['topic_id'];?>">Read More</a>
					</div>
				</div>
				<table class="contentPage2">
					<tr>
						<td class="arc">
							<?php
								$data = mysqli_fetch_assoc(mysqli_query($conn, "SELECT title, picture, topic_id from topic where category = 'programming' and topic_id = 20 and deleted = 0 and block = 0"));
							?>
							<a href="article.php?id=<?php echo $data['topic_id'];?>"><img src="<?php echo $data['picture']; ?>"></a>
							<a href="article.php?id=<?php echo $data['topic_id'];?>"><?php echo $data['title']; ?></a>
						</td>
						<td style="padding: 0px 20px;"></td>
						<td class="arc">
							<?php
								$data = mysqli_fetch_assoc(mysqli_query($conn, "SELECT title, picture, topic_id from topic where category = 'programming' and topic_id = 22 and deleted = 0 and block = 0"));
							?>
							<a href="article.php?id=<?php echo $data['topic_id'];?>"><img src="<?php echo $data['picture']; ?>"></a>
							<a href="article.php?id=<?php echo $data['topic_id'];?>"><?php echo $data['title']; ?></a>
						</td>
						<td style="padding: 0px 20px;"></td>
						<td class="arc">
							<?php
								$data = mysqli_fetch_assoc(mysqli_query($conn, "SELECT title, picture, topic_id from topic where category = 'programming' and topic_id = 23 and deleted = 0 and block = 0"));
							?>
							<a href="article.php?id=<?php echo $data['topic_id'];?>"><img src="<?php echo $data['picture']; ?>"></a>
							<a href="article.php?id=<?php echo $data['topic_id'];?>"><?php echo $data['title']; ?></a>
						</td>
					</tr>
					<tr>
			      		<td><br><br></td>
			      	</tr>
					<tr>
						<td class="arc">
							<?php
								$data = mysqli_fetch_assoc(mysqli_query($conn, "SELECT title, picture, topic_id from topic where category = 'programming' and topic_id = 24 and deleted = 0 and block = 0"));
							?>
							<a href="article.php?id=<?php echo $data['topic_id'];?>"><img src="<?php echo $data['picture']; ?>"></a>
							<a href="article.php?id=<?php echo $data['topic_id'];?>"><?php echo $data['title']; ?></a>
						</td>
						<td style="padding: 0px 20px;"></td>
						<td class="arc">
							<?php
								$data = mysqli_fetch_assoc(mysqli_query($conn, "SELECT title, picture, topic_id from topic where category = 'programming' and topic_id = 25 and deleted = 0 and block = 0"));
							?>
							<a href="article.php?id=<?php echo $data['topic_id'];?>"><img src="<?php echo $data['picture']; ?>"></a>
							<a href="article.php?id=<?php echo $data['topic_id'];?>"><?php echo $data['title']; ?></a>
						</td>
						<td style="padding: 0px 20px;"></td>
						<td class="arc">
							<?php
								$data = mysqli_fetch_assoc(mysqli_query($conn, "SELECT title, picture, topic_id from topic where category = 'programming' and topic_id = 26 and deleted = 0 and block = 0"));
							?>
							<a href="article.php?id=<?php echo $data['topic_id'];?>"><img src="<?php echo $data['picture']; ?>"></a>
							<a href="article.php?id=<?php echo $data['topic_id'];?>"><?php echo $data['title']; ?></a>
						</td>
					</tr>
					<tr>
			      		<td><br><br></td>
			      	</tr>
					<tr>
						<td class="arc">
							<?php
								$data = mysqli_fetch_assoc(mysqli_query($conn, "SELECT title, picture, topic_id from topic where category = 'programming' and topic_id = 27 and deleted = 0 and block = 0"));
							?>
							<a href="article.php?id=<?php echo $data['topic_id'];?>"><img src="<?php echo $data['picture']; ?>"></a>
							<a href="article.php?id=<?php echo $data['topic_id'];?>"><?php echo $data['title']; ?></a>
						</td>
						<td style="padding: 0px 20px;"></td>
						<td class="arc">
							<?php
								$data = mysqli_fetch_assoc(mysqli_query($conn, "SELECT title, picture, topic_id from topic where category = 'programming' and topic_id = 28 and deleted = 0 and block = 0"));
							?>
							<a href="article.php?id=<?php echo $data['topic_id'];?>"><img src="<?php echo $data['picture']; ?>"></a>
							<a href="article.php?id=<?php echo $data['topic_id'];?>"><?php echo $data['title']; ?></a>
						</td>
						<td style="padding: 0px 20px;"></td>
						<td class="arc">
							<?php
								$data = mysqli_fetch_assoc(mysqli_query($conn, "SELECT title, picture, topic_id from topic where category = 'programming' and topic_id = 29 and deleted = 0 and block = 0"));
							?>
							<a href="article.php?id=<?php echo $data['topic_id'];?>"><img src="<?php echo $data['picture']; ?>"></a>
							<a href="article.php?id=<?php echo $data['topic_id'];?>"><?php echo $data['title']; ?></a>
						</td>
					</tr>
				</table>
				<br><br>
			</div>
		</div>
		<div class="aside">
			<h2>Hot Review</h2>
			<?php 
				$sql = "SELECT title, topic_id, picture, substring(content, 1, 50) as content from topic where star >=  10 and star < 50 and deleted = 0 and block = 0 limit 3";
				$res = mysqli_query($conn, $sql);
				while($data = mysqli_fetch_assoc($res)){
			?>
			<div class="context">
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