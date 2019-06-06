<?php
	include "header.php";
	$id = $_GET['id'];
?>

<!DOCTYPE html>
<html>
<head>
	<script type="text/javascript">
		$(document).ready(function(){
			<?php 
			if ($_SESSION['login'] == true){ ?>
				$("#report").removeClass("hidden");
			<?php } ?>
		});
	</script>
</head>
<body>
	<div class="flex-container">
		<div class="article">
			<div class="border">
				<h2>Posting</h2>
				<?php
					$sql = "SELECT substring(content, 1, 150) as content, title, picture, topic_id from topic where user_id = ".$id;
					$res = mysqli_query($conn, $sql);
					while($data = mysqli_fetch_assoc($res)){
				?>
				<div class="content">
					<div class="pict">
						<img src="<?php echo $data['picture']; ?>">
					</div>
					<div class="text">
						<h3><?php echo $data['title'];?></h3>
						<?php echo $data['content'];?>.....
						<br><br>
						<a href="article.php?id=<?php echo $data['topic_id'];?>">Read More</a>
					</div>
				</div>
				<br>
				<?php }?>
			</div>
		</div>
		<div class="aside">
			<?php
				$sql = "SELECT * from user where id_num = ".$id;
				$res = mysqli_query($conn, $sql);
				$data = mysqli_fetch_assoc($res);
			?>
			<a href="#" id="report" class="report hidden"><img src="img/report.png"></a>
			<h2>Profil</h2>
			
			<div class="context">
				<img src="<?php echo $data['user_pict']; ?>">
				<div class="text">
				<h3>Username</h3>
				<p><?php echo $data['username']; ?></p>
				<h3>Name</h3>
				<p><?php echo $data['first_name']." ".$data['mid_name']." ".$data['last_name']; ?></p>
				<h3>Birthday</h3>
				<p><?php echo $data['birthday']; ?></p>
				<h3>Email</h3>
				<p><?php echo $data['email']; ?></p>
				<h3>Bio</h3>
				<p><?php echo $data['bio']; ?></p>
						
				</div>
			</div>
			<br>
			
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
	      		<input type="hidden" name="id" value="<?php echo $data['topic_id'];?>">
	      		<input type="hidden" name="id" value="<?php echo $data['id_num'];?>">
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