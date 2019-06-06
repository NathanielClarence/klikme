<?php
	include "header.php";

	if(isset($_GET['id'])){
		$id = $_GET['id'];
		switch($id){
			case 1: $sql = "SELECT * from user where id_num != 1 and block_sts = 0"; break;
			case 2: $sql = "SELECT * from user where block_sts = 1"; break;
			case 3: $sql = "SELECT * from report, topic, user where id_topic = topic_id and id_user = id_num"; break;
			case 4: $sql = "SELECT * from topic where block = 1"; break;
			case 5: $sql = "SELECT * from topic where deleted = 1"; break;
		}
	}
	$res = mysqli_query($conn, $sql);
?>

<!DOCTYPE html>
<html>
<head>
	<script type="text/javascript">
		$(document).ready(function(){
			adjustment();

			$button1 = $("#expand1");
			$button2 = $("#expand2");
			$memberAll = $("#memberAll");
			$memberBlock = $("#memberBlock");
			$postSpam = $("#postSpam");
			$postBlock = $("#postBlock");
			$postDelete = $("#postDelete");
			$report = $("#report");
			$context = $("#context");
			$detail = $("#detail");

			$button1.click(function(){
				if ($button1.text() == "+"){
					$button1.text("-");
					$memberAll.removeClass("none");
					$memberBlock.removeClass("none");
				}
				else if ($button1.text() == "-"){
					$button1.text("+");
					$memberAll.addClass("none");
					$memberBlock.addClass("none");
				}
			});

			$button2.click(function(){
				if ($button2.text() == "+"){
					$button2.text("-");
					$postSpam.removeClass("none");
					$postBlock.removeClass("none");
					$postDelete.removeClass("none");
				}
				else if ($button2.text() == "-"){
					$button2.text("+");
					$postSpam.addClass("none");
					$postBlock.addClass("none");
					$postDelete.addClass("none");
				}
			});

			$memberAll.click(function(){
				$report.text("Member > All");
				$.ajax({
					url: 'managementAdmin.php?id=1',
					type: 'GET',
					success: function(data){
						$context.html(data);
					}
				});
			});

			$memberBlock.click(function(){
				$report.text("Member > Blocked");
				$.ajax({
					url: 'managementAdmin.php?id=2',
					type: 'GET',
					success: function(data){
						$context.html(data);
					}
				});
			});

			$postSpam.click(function(){
				$report.text("Reports");
				$.ajax({
					url: 'managementAdmin.php?id=3',
					type: 'GET',
					success: function(data){
						$context.html(data);
					}
				});
			});

			$postBlock.click(function(){
				$report.text("Post > Blocked");
				$.ajax({
					url: 'managementAdmin.php?id=4',
					type: 'GET',
					success: function(data){
						$context.html(data);
					}
				});
			});

			$postDelete.click(function(){
				$report.text("Post > Deleted");
				$.ajax({
					url: 'managementAdmin.php?id=5',
					type: 'GET',
					success: function(data){
						$context.html(data);
					}
				});
			});

			$modal = $('.myModal');
			$btn = $(".gear");

			function adjustment(){
				$count = $(".identity").length;
				$identity = "";
				for ($i = 0; $i < $count; $i++){
					$identity = $(".identity").eq($i).text().toLowerCase();
					$(".myModal").eq($i).addClass($identity);
				}
			}

			
		});
	</script>
</head>
<body>
	<div class="flex-container">
		<div class="aside">
			<div class="content2">
				<dl>
					<dt>Members</dt>
					<dt><button id="expand1">+</button> List of Account</dt>
						<dd id="memberAll" class="none expand"><a href="#">All</a></dd>
						<dd id="memberBlock" class="none expand"><a href="#">Block</a></dd>
				</dl>
				<br>
				<dl>
					<dt>Post</dt>
					<dt><button id="expand2">+</button> List of Post</dt>
						<dd id="postSpam" class="none expand"><a href="#">Reports</a></dd>
						<dd id="postBlock" class="none expand"><a href="#">Block</a></dd>
						<dd id="postDelete" class="none expand"><a href="#">Deleted</a></dd>
					<dt>Setting</dt>
				</dl>
			</div>
			<br><br>
		</div>
		
		<div class="article">
			<div id="manage">
				<h2 id="report">Members > All</h2>
				<div class="context" id="context">
				<?php while($data = mysqli_fetch_assoc($res)){ ?>
					<table>
						
						<tr>
							<td class="pp"><img src="<?php echo $data['user_pict'];?>"></td>
							<td class="pp"><h4><?php echo $data['first_name'].' '.$data['mid_name'].' '.$data['last_name']; ?></h4></td>
							<td class="pp"><a href="#"><img src="img/setting.png" class="gear <?php echo $data['id_num'];?>"></a></td>
						</tr>
					</table>
					<div class="myModal" class="modal" style="display: none;">
					 	<div class="modal-content">
					    	<div class="modal-header">
					      		<span class="close">&times;</span>
					      		<h2>Setting</h2>
					    	</div>
					    	<div class="modal-body">
				    			<h2>Details</h2>
				    			<div id="detail">
				    				<table>
										<tr>
											<td><img src="<?php echo $data['user_pict'];?>" style="width: 200px;"></td>
										</tr>
										<tr>
											<td>Id num : </td>
											<td class="identity"><?php echo $data['id_num'];?></td>
										</tr>
										<tr>
											<td>Name : </td>
											<td><?php echo $data['first_name'].' '.$data['mid_name'].' '.$data['last_name']; ?></td>
										</tr>
										<tr>
											<td>Email : </td>
											<td><?php echo $data['email'];?></td>
										</tr>
										<tr>
											<td>Birthday : </td>
											<td><?php echo $data['birthday'];?></td>
										</tr>
										<tr>
											<td>Time Registration : </td>
											<td><?php echo $data['time_reg'];?></td>
										</tr>
										<tr>
											<td>Block Status : </td>
											<td><?php echo $data['block_sts'];?></td>
										</tr>
										<tr>
											<td>Reputation : </td>
											<td><?php echo $data['reputation'];?></td>
										</tr>
										<tr>
											<td>User Rank : </td>
											<td><?php echo $data['user_rank'];?></td>
										</tr>
									</table>
				    			</div>
				    			<a href="blockUser.php?id=<?php echo $data['id_num'];?>"><button class='block'>Block</button></a>
					    	</div>
					  	</div>
					</div>
					<?php } ?>
				</div>
				<br>
			</div>
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

	<script>
		$modal = $('.myModal');
		$btn = $(".gear");
		$span = $(".close");
		$unblock = $(".unblock");
		$del = $(".delete");
		
		$btn.click(function(){
			// $type = $btn.attr('class');
			// $arr = $type.split(' ');
			// $id = $arr[1];
			// $modal.eq($id).css('display', 'block');
			
			$modal.css('display', 'block');
		});

		$span.click(function() {
		    $modal.css('display', 'none');
		});

		$del.click(function(){
			$answer = confirm("Do you want to delete this account ?");
			if ($answer){
				$modal.css('display', 'none');
			}
		});

		$unblock.click(function(){
			$answer = confirm("Do you want to unblock this account ? ");
			if ($answer){
				$modal.css('display', 'none');
			}
		});

		$(window).onclick = function(event) {
		    if (event.target == $modal) {
		        $modal.css('display', 'none');
		    }
		}
	</script>
</body>
</html>