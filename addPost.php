<?php
	include "header.php";

	$id = $_GET['id'];
	if (!isset($_GET['content'])){
		$sql = "SELECT substring(content, 1, 150) as content, title, picture, topic_id, category from topic where deleted = 0 and user_id = ".$id;
		$res = mysqli_query($conn, $sql);
	}
	else{
		$content = $_GET['content'];
		switch($content){
			case 1: $sql = "SELECT substring(content, 1, 150) as content, title, picture, topic_id, category from topic where category = 'hardware' and deleted = 0 and user_id = ".$id; break;
			case 2: $sql = "SELECT substring(content, 1, 150) as content, title, picture, topic_id, category from topic where category = 'software' and deleted = 0 and user_id = ".$id; break;
			case 3: $sql = "SELECT substring(content, 1, 150) as content, title, picture, topic_id, category from topic where category = 'programming' and deleted = 0 and user_id = ".$id; break;
		}
		$res = mysqli_query($conn, $sql);
	}
?>

<!DOCTYPE html>
<html>
<head>
	<script type="text/javascript">
		$(document).ready(function(){
			$button = $("#expand");
			$expand1 = $("#expandNode1");
			$expand2 = $("#expandNode2");
			$expand3 = $("#expandNode3");
			$setting = $("select");

			$button.click(function(){
				if ($button.text() == "+"){
					$expand1.removeClass("none");
					$expand2.removeClass("none");
					$expand3.removeClass("none");
					$button.text("-");
				}
				else{
					$expand1.addClass("none");
					$expand2.addClass("none");
					$expand3.addClass("none");
					$button.text("+");
				}
			});

			$setting.on('change', function(){
				$idTopic = $(this).attr("id");
				if(this.value == "edit"){
					window.location.assign('editPost.php?id=<?php echo $id;?>&idTopic='+$idTopic);
				}
				else if(this.value == "delete"){
					$ans = confirm("Do you want to delete this post ? ");
					if ($ans == true){
						$.ajax({
							url: 'deletePost.php?id=' + $idTopic,
							type: 'GET',
							success: function(data){
								window.location.reload();
								// alert("Delete post success!");

							}
						});
					}
					else if ($ans == false){
						
					}
				}				
			});
		});
	</script>
</head>
<body>
	<div class="flex-container2">
		<div class="article2">
			<a href="typePost.php?id=<?php echo $id;?>"><button id="newpost" class="button" style="margin: 10px; float: right;">Create Post</button></a>
			<div class="border" style="margin-top: 50px;">
				<?php while($data = mysqli_fetch_assoc($res)){ ?>
				<div class="content">
					<div class="pict">
						<img src="<?php echo $data['picture'];?>">
					</div>
					<div class="text">
						<select id = "<?php echo $data['topic_id'];?>">
							<option></option>
							<option value="edit">Edit</option>
							<option value="delete">Delete</option>
						</select>
						<h6><?php echo $data['category'];?></h6>
						<h3><?php echo $data['title']?></h3>
						<?php echo $data['content'];?>.....
						<br><br>
						<a href="article.php?id=<?php echo $data['topic_id']?>">Read More</a>
					</div>
				</div>
				<br>
				<?php }?>
			</div>
		</div>
		<div class="aside2">
			<h2>Post</h2>
			<dl>
				<dt><button id="expand">+</button><a href="addPost.php?id=<?php echo $id;?>">All</a></dt>
				<dd id="expandNode1" class="none"><a href="addPost.php?id=<?php echo $id;?>&content=1">Hardware</a></dd>
				<dd id="expandNode2" class="none"><a href="addPost.php?id=<?php echo $id;?>&content=2">Software</a></dd>
				<dd id="expandNode3" class="none"><a href="addPost.php?id=<?php echo $id;?>&content=3">Programming</a></dd>
			</dl>
			<a href="#">Draft</a> <br>
			<br>
			<a href="#">Setting</a>
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

