<?php
	include "header.php";
	include "reputation.php";
  	$username = $_SESSION['username'];

  	$query = "SELECT * FROM user where username='$username'";

  	$hasil = mysqli_query($conn, $query);
  	while($data = mysqli_fetch_assoc($hasil))
  	{	
?>


<!DOCTYPE html>
<html>
<head>
</head>
<body>
	<div class="profile">
		<div class=right>
			<strong><h3>Reputation</h3></strong>
			<table>
				<tr>
					<td>
						<img src=<?php echo $_SESSION["dlLink"]; ?> style="height: 20%; width:<?php echo $_SESSION["percent"]; ?>%;padding: 0;">
					</td>
				</tr>
				<tr>
					<td>
						Reputation: <?php echo $_SESSION["reps"]; ?> out of 5.0
					</td>
				</tr>
			</table>
		</div>
		<table>
			<tr><br>
				<td><img src=<?php echo $data['user_pict']; ?>></td>
			</tr>
			<tr>
				<td><br></td>
			</tr>
			<tr>
				<td>Username</td>
				<td style="padding-left: 50px;"></td>
				<td><?php echo $_SESSION['username']; ?></td>
			</tr>
			<tr>
				<td><br></td>
			</tr>
			<tr>
				<td>First Name</td>
				<td style="padding-left: 50px;"></td>
				<td><?php echo $data['first_name']; ?></td>
			</tr>
			<tr>
				<td><br></td>
			</tr>
			<tr>
				<td>Middle Name</td>
				<td style="padding-left: 50px;"></td>
				<td><?php echo $data['mid_name']; ?></td>
			</tr>
			<tr>
				<td><br></td>
			</tr>
			<tr>
				<td>Last Name</td>
				<td style="padding-left: 50px;"></td>
				<td><?php echo $data['last_name']; ?></td>
			</tr>
			<tr>
				<td><br></td>
			</tr>
			<tr>
				<td>Email</td>
				<td style="padding-left: 50px;"></td>
				<td><?php echo $data['email']; ?></td>
			</tr>
			<tr>
				<td><br></td>
			</tr>
			<tr>
				<td>Birthday</td>
				<td style="padding-left: 50px;"></td>
				<td><?php echo $data['birthday']; ?></td>
			</tr>
			<tr>
				<td><br></td>
			</tr>
			<tr>
				<td>Time Registered</td>
				<td style="padding-left: 50px;"></td>
				<td><?php echo $data['time_reg']; ?></td>
				</tr>
			<tr>
				<td><br></td>
			</tr>
			<tr>
				<td>Biodata</td>
				<td style="padding-left: 50px;"></td>
				<td><?php echo $data['bio']; ?></td>
			</tr>
		</table>
		<br>
		<button id="myBtn" class="button" name="button">Edit</button>
	</div>

	<!-- The Modal -->
	<div id="myModal" class="modal">
		<!-- Modal content -->
	 	<div class="modal-content">
	    	<div class="modal-header">
	      		<span class="close">&times;</span>
	      		<h2>Edit Profile</h2>
	    	</div>
	    	<div class="modal-body">
	    		<form action="profilEdit.php?id=<?php echo $data['id_num'];?>" method="post" enctype="multipart/form-data"></form>
		      		<table>
		      			<tr>
		      				<td><img src="<?php echo $data['user_pict'];?>" style="width: 100px;"></td>
		      			</tr>
		      			<tr>
		      				<td>Choose your photo : </td>
		      			</tr>
		      			<tr>
		      				<td><input type="file" name="photo" id="photo" ></td>
		      			</tr>
		      			<tr>
							<td><label>Username</label></td>
							<td><input type="text" name="uname" id="uname" value="<?php echo $data['username'];?>"> <br></td>
						</tr>
						<tr>
							<td><label>First Name</label></td>
							<td><input type="text" name="fname" id="fname" value="<?php echo $data['first_name'];?>"> <br></td>
						</tr>
						<tr>
							<td><label>Middle Name</label></td>
							<td><input type="text" name="middle_name" id="mname" value="<?php echo $data['mid_name'] ?>"> <br></td>
						</tr>
						<tr>
							<td><label>Last Name</label></td>
							<td><input type="text" name="lname" id="lname" value="<?php echo $data['last_name'] ?>"> <br></td>
						</tr>
						<tr>
							<td><label>Email</label></td>
							<td><input type="text" name="tmbh_email" id="tmbh_email" value="<?php echo $data['email'] ?>"> <br></td>
						</tr>
						<tr>
							<td><label>Password</label></td>
							<td><input type="password" name="pwd" id="pwd" value=""></td>
							
						</tr>
						<tr>
							<td><label>Birthday</label></td>
							<td><input type="date" name="bday" id="bday" value="<?php echo $data['birthday'] ?>"></td>
						</tr>
						<tr>
							<td><label>Bio</label></td>
							<td><input type="text" name="biodt" id="biodt" value="<?php echo $data['bio'] ?>"><br></td>
						</tr>
					</table>
					<br>
					<input type="submit" class="save" name="save" value="Save" id="save">
				</form>
	    	</div>
	  	</div>
	</div>
	<script>
	// Get the modal
	var modal = document.getElementById('myModal');

	// Get the button that opens the modal
	var btn = document.getElementById("myBtn");

	// Get the <span> element that closes the modal
	var span = document.getElementsByClassName("close")[0];

	//Get the input element save
	var save = document.getElementById("save");

	// When the user clicks the button, open the modal 
	btn.onclick = function() {
	    modal.style.display = "block";
	}

	// When the user clicks on <span> (x), close the modal
	span.onclick = function() {
	    modal.style.display = "none";
	}

	save.onclick = function(){
		$photo = $("input#photo").val();
	    $uname = $("input#uname").val();
	    $fname = $("input#fname").val();
	    $mname = $("input#mname").val();
	    $lname = $("input#lname").val();
	    $tmbh_email = $("input#tmbh_email").val();
	    $pwd = $("input#pwd").val();
	    $bday = $("input#bday").val();
	    $biodt = $("input#biodt").val();

	 //    var dataString = 'photo = ' + $photo + '&uname = ' + $uname +'&fname = ' + $fname + '&mname = ' + $mname + '&lname = ' + $lname + '&tmbh_email = ' + $tmbh_email + '&pwd = ' + $pwd + '&bday = ' + $bday + '&biodt = ' + $biodt;

		// $.ajax({
		// 	url: 'profilEdit.php?id='+$data['id_num'],
		// 	type: 'POST',
		// 	data: dataString,
		// 	success: function(data){
		// 		alert(data);
		// 	}
		// });
		window.location.assign("profilEdit.php?id=<?php echo $data['id_num'];?>&photo=" + $photo + "&uname=" + $uname + "&fname=" + $fname + "&mname=" + $mname + "&lname=" + $lname + "&tmbh_email=" + $tmbh_email + "&pwd=" + $pwd + "&bday=" + $bday + "&biodt=" + $biodt);
	}

	// When the user clicks anywhere outside of the modal, close it
	window.onclick = function(event) {
	    if (event.target == modal) {
	        modal.style.display = "none";
	    }
	}
	</script>

	<div class="footer">
		<p>Contact Us:</p>
		<img src="img/facebook.png">
		<img src="img/twitter.png">
		<img src="img/google+.png">
	</div>
	<?php } ?>
</body>
</html>