<?php
	include "header.php";

	$id = $_GET['id'];

	$sql = "UPDATE topic set total_views = total_views + 1 where topic_id = ".$id;
	mysqli_query($conn, $sql);

	if (isset($_SESSION['msg'])) {
		echo "<script>alert(".$_SESSION['msg'].")</script>";
		unset($_SESSION['msg']);
	}

	$sql = "SELECT * from user, topic where id_num = user_id and deleted = 0 and block = 0 and topic_id = ".$id;
	$res = mysqli_query($conn, $sql);
	$data = mysqli_fetch_assoc($res);
?>

<!DOCTYPE html>
<html>
<head>
	<script type="text/javascript">
		$(document).ready(function(){
			<?php if ($_SESSION['login']){ ?>
				$("#rate").removeClass("none");
				$(".reputasi").removeClass("none");
				$("#reputasi2").removeClass("none");
				<?php if ($_SESSION['username'] == 'admin') {?>
					$(".admin").removeClass("none");
			<?php } ?>
				$("select").on('change', function(){
					$idTopic = $(this).attr("name");
					if(this.value == "block"){
						$ans = confirm("Do you want to block this post ?");
						if ($ans == true){
							alert("Block post success");
							window.location.assign('blockPost.php?id=<?php echo $id;?>&idTopic='+$idTopic);
						}
						else{
							
						}
					}
					else if (this.value == "delete"){
						$ans = confirm("Do you want to delete this post ? ");
						if ($ans == true){
							alert("Delete post success");
							window.location.assign('deletePost.php?id=<?php echo $id;?>&idTopic='+$idTopic);
						}
					}
					else if (this.value == "deleteC"){
						$idComment = $(this).attr("name");
						$ans = confirm("Do you want to delete this comment ? ");
						if ($ans == true){
							alert("Delete comment success");
							window.location.assign('deleteComment.php?id=<?php echo $id;?>&comment='+$idComment);
						}
					}
					else if (this.value == "blockC"){
						$idComment = $(this).attr("name");
						$ans = confirm("Do you want to block this comment ? ");
						if ($ans == true){
							alert("Block comment success");
							window.location.assign('blockComment.php?id=<?php echo $id;?>&comment='+$idComment);
						}
					}
				});
			<?php }?>
		});
	</script>
</head>
<body>
	<div class="flex-container">
		<div class="article">
			<div class="content1">
				<div class="post">
					<?php echo $data['posted'];?>
				</div>
				<div class="poster">
					<a href="profilOrang.php?id=<?php echo $data['id_num']?>" class="user"><img src="<?php echo $data['user_pict'];?>"></a>
					<a href="profilOrang.php?id=<?php echo $data['id_num']?>" class="user"><p><?php echo $data['first_name'].' '.$data['mid_name'].' '.$data['last_name'];?></p></a>
				</div>
				<div class="topArticle">
					<div class="titleArticle">
						<h2><?php echo $data['title'];?></h2>
					</div>
					<div class="star none" id="rate">
						<a href="star.php?id=<?php echo $data['topic_id'];?>"><img src="img/star.png"></a>
						<a href="#" id="report"><img src="img/report.png"></a>
					</div>
				</div>
				<select class="admin none" name="<?php echo $data['topic_id'];?>">
					<option></option>
					<option value="block">Block</option>
					<option value="delete">Delete</option>
				</select>
				<img src="<?php echo $data['picture'];?>" class="pictArticle">
				<div class="textArticle">
					<?php echo nl2br($data['content']);?>
				</div>
			</div>
			<?php
				$sql = "SELECT * from comment, user, topic where id_user = id_num and id_topic = topic_id and comment.deleted = 0 and comment.block = 0";
				$res = mysqli_query($conn, $sql);
				while($data = mysqli_fetch_assoc($res)){
			?>
			<div class="content1">
				<div class="post">
					<?php echo $data['time'];?>
				</div>
				<div class="comment">
					<div class="foto">
						<a href="profilOrang.php?id=<?php echo $data['id_num']?>" class="user"><img src="<?php echo $data['user_pict'];?>"></a>
						<br>
						<a href="profilOrang.php?id=<?php echo $data['id_num']?>" class="user"><p><?php echo $data['first_name']." ".$data['mid_name']." ".$data['last_name']; ?></p></a>
						<div class="reputasi none">
							<a href="giveReputation.php?id=<?php echo $data['id_num'];?>&rep=1&loc=<?php echo $data['topic_id'];?>"><button class="round bad"></button></a>
							<a href="giveReputation.php?id=<?php echo $data['id_num'];?>&rep=2&loc=<?php echo $data['topic_id'];?>"><button class="round mid"></button></a>
							<a href="giveReputation.php?id=<?php echo $data['id_num'];?>&rep=3&loc=<?php echo $data['topic_id'];?>"><button class="round good"></button></a>
						</div>
					</div>
					<div class="komen">
						<select class="admin none" name="<?php echo $data['comment_id'];?>">
							<option></option>
							<option value="blockC">Block</option>
							<option value="deleteC">Delete</option>
						</select>
						<div><?php echo $data['context'];?></div>
						<br>
						<?php 
							$q = "SELECT * from replycomment, user, topic where id_user = id_num and id_topic = topic_id and replycomment.deleted = 0 and replycomment.block = 0 and comment_id = ".$data['comment_id'];
							$r = mysqli_query($conn, $q);
							while($d =  mysqli_fetch_assoc($r)){
						?>
						<a href="profilOrang.php" class="user"><img src="<?php echo $d['user_pict'];?>"></a>
						<a href="profilOrang.php" class="user"><p><?php echo $d['first_name']." ".$d['mid_name']." ".$d['last_name'];?></p></a>
						<div><?php echo $d['context'];?></div>
						<?php } ?>
						<br>
						<form action="addReplyToDB.php?id=<?php echo $id;?>&user=<?php echo $_SESSION['username'];?>&comment=<?php echo $data['comment_id']?>" method="POST">
							<textarea name="context" cols="40" rows="3"></textarea>
							<input type="submit" name="submit" value="Submit" class="button">
						</form>
					</div>
				</div>
			</div>
			<?php } ?>
			<div class="content1">
				<div class="post">
					<?php
						$time = time();
						echo date("Y-m-d h:i:sa", $time);
					?>
				</div>
				<?php
					$search = '%'.$_SESSION['username'].'%';
					$sql = "SELECT * from user where username like '$search'";
					$res = mysqli_query($conn, $sql);
					$data = mysqli_fetch_assoc($res);
				?>
				<div class="comment">
					<div class="foto">
						<a href="profilOrang.php" class="user"><img src="<?php echo $data['user_pict'];?>"></a>
						<br>
						<a href="profilOrang.php" class="user"><p><?php echo $data['first_name']." ".$data['mid_name']." ".$data['last_name'];?></p></a>
					</div>
					<div class="komen">
						<form action="addCommentToDB.php?id=<?php echo $id;?>&user=<?php echo $data['id_num'];?>" method="POST">
							<textarea name="context" cols="40" rows="3"></textarea>
							<input type="submit" name="submit" value="Submit" class="button">
						</form>
					</div>
				</div>
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

<?php
	$sql = "SELECT * from user, topic where id_num = user_id and topic_id = ".$id;
	$res = mysqli_query($conn, $sql);
	$data = mysqli_fetch_assoc($res);
?>
<!-- The Modal -->
<div id="myModal" class="modal">
	<!-- Modal content -->
 	<div class="modal-content">
    	<div class="modal-header">
      		<span class="close">&times;</span>
      		<h2>Report</h2>
    	</div>
    	<div class="modal-body">
	      	<form action="report.php" method="post">
	      		<h4>Why do you want to report it ?</h4>
	      		<input type="radio" name="report" value="spam">Spam<br>
	      		<input type="radio" name="report" value="sara">Containing SARA<br>
	      		<input type="radio" name="report" value="disturb">It's disturb me<br>
	      		<input type="radio" name="report" value="nothing">Nothing<br><br>
	      		<input type="hidden" name="idTopic" value="<?php echo $data['topic_id'];?>">
	      		<input type="hidden" name="idUser" value="<?php echo $data['id_num'];?>">
	      		<input type="submit" name="submit" value="Submit" id="submit" class="button">
	      	</form>
	    </div>
  	</div>
</div>

<script>
// Get the modal
var modal = document.getElementById('myModal');

// Get the button that opens the modal
var btn = document.getElementById("report");

// Get the <span> element that closes the modal
var span = document.getElementsByClassName("close")[0];

//Get the input element save
var submit = document.getElementById("submit");

// When the user clicks the button, open the modal 
btn.onclick = function() {
    modal.style.display = "block";
}

// When the user clicks on <span> (x), close the modal
span.onclick = function() {
    modal.style.display = "none";
}

submit.onclick = function(){
	alert("Your report is sent to admin, Thank You");
	modal.style.display = "none";
}

// When the user clicks anywhere outside of the modal, close it
window.onclick = function(event) {
    if (event.target == modal) {
        modal.style.display = "none";
    }
}
</script>
</html>