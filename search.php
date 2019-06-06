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
				<?php $searchtext = '%'.$_GET['search'].'%';
				$query = "SELECT * from user where username like '$searchtext'";
				$res = mysqli_query($conn, $query);
				while($data = mysqli_fetch_assoc($res)){ ?>
					<div class="dataSearch">
						<a href="profilOrang.php?id=<?php echo $data['id_num'];?>" class="listSearch"><img src="img/propic.png" id="pictSearch">
						<?php echo $data['username']; ?></a>
					</div>
				<?php }
				$query = "SELECT * from topic where title like '$searchtext'";
				$res = mysqli_query($conn, $query);
				while($data = mysqli_fetch_assoc($res)){ ?> 
					<div class="dataSearch">
						<a href="article.php?id=<?php echo $data['topic_id'];?>" class="listSearch"><img src="<?php echo $data['picture'];?>" id="pictSearch">
						<?php echo $data['title']; ?></a>
					</div>
				<?php } ?>
			</div>
			<br><br>
		</div>
		<div class="aside">
			<h2>Hot Review</h2>
			<?php for($i = 0; $i < 2; $i++) {?>
			<div class="context">
				<select id="admin" class="hidden">
					<option></option>
					<option>Block</option>
					<option>Delete</option>
				</select>
				<img src="img/4.jpg">
				<div class="text">
					<h3>TITLE</h3>
					Lorem ipsum dolor sit amet, consectetur adipiscing elit. Quisque pellentesque cursus magna ac finibus. Nulla eget tristique nisl. In pharetra justo vel laoreet rhoncus. Praesent id venenatis elit. Duis elementum magna quis tellus interdum congue. Integer dictum purus ut posuere porta.
					<br><br>
					<a href="#">Read More</a>
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
	