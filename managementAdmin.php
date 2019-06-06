<?php
	include "koneksi.php";

	$id = $_GET['id'];

	switch($id){
		case 1: $sql = "SELECT * from user where id_num != 1 and block_sts = 0"; break;
		case 2: $sql = "SELECT * from user where block_sts = 1"; break;
		case 3: $sql = "SELECT * from report, topic, user where id_topic = topic_id and id_user = id_num"; break;
		case 4: $sql = "SELECT * from topic where block = 1"; break;
		case 5: $sql = "SELECT * from topic where deleted = 1"; break;
	}

	$res = mysqli_query($conn, $sql);

	while($data = mysqli_fetch_assoc($res)){
		if ($id == 1){
			echo "
			<table>
				<tr>
					<td class='pp'><img src='".$data['user_pict']."'></td>
					<td class='pp'><h4> ".$data['first_name'].' '.$data['mid_name'].' '.$data['last_name']."</h4></td>
					<td class='pp'><a href='#'><img src='img/setting.png' class='gear' id='".$data['id_num']."'></a></td>
				</tr>
			</table>
			<div class='myModal' class='modal' style='display: none;'>
			 	<div class='modal-content'>
			    	<div class='modal-header'>
			      		<span class='close'>&times;</span>
			      		<h2>Setting</h2>
			    	</div>
			    	<div class='modal-body'>
		    			<h2>Details</h2>
		    			<div id='detail'>
		    				<table>
								<tr>
									<td><img src='".$data['user_pict']."' style='width: 200px;'></td>
								</tr>
								<tr>
									<td>Id num : </td>
									<td class='identity'>".$data['id_num']."</td>
								</tr>
								<tr>
									<td>Name : </td>
									<td>".$data['first_name'].' '.$data['mid_name'].' '.$data['last_name']."</td>
								</tr>
								<tr>
									<td>Email : </td>
									<td>".$data['email']."</td>
								</tr>
								<tr>
									<td>Birthday : </td>
									<td>".$data['birthday']."</td>
								</tr>
								<tr>
									<td>Time Registration : </td>
									<td>".$data['time_reg']."</td>
								</tr>
								<tr>
									<td>Block Status : </td>
									<td>".$data['block_sts']."</td>
								</tr>
								<tr>
									<td>Reputation : </td>
									<td>".$data['reputation']."</td>
								</tr>
								<tr>
									<td>User Rank : </td>
									<td>".$data['user_rank']."</td>
								</tr>
							</table>
		    			</div>
		    			<a href='blockUser.php?id=".$data['id_num']."'><button class='unblock'>Block</button></a>
			    	</div>
			  	</div>
			</div>";
		}
		else if ($id == 2){
			echo "
			<table>
				<tr>
					<td class='pp'><img src='".$data['user_pict']."'></td>
					<td class='pp'><h4> ".$data['first_name'].' '.$data['mid_name'].' '.$data['last_name']."</h4></td>
					<td class='pp'><a href='#'><img src='img/setting.png' class='gear' id='".$data['id_num']."'></a></td>
				</tr>
			</table>
			<div class='myModal' class='modal' style='display: none;'>
			 	<div class='modal-content'>
			    	<div class='modal-header'>
			      		<span class='close'>&times;</span>
			      		<h2>Setting</h2>
			    	</div>
			    	<div class='modal-body'>
		    			<h2>Details</h2>
		    			<div id='detail'>
		    				<table>
								<tr>
									<td><img src='".$data['user_pict']."' style='width: 200px;'></td>
								</tr>
								<tr>
									<td>Id num : </td>
									<td class='identity'>".$data['id_num']."</td>
								</tr>
								<tr>
									<td>Name : </td>
									<td>".$data['first_name'].' '.$data['mid_name'].' '.$data['last_name']."</td>
								</tr>
								<tr>
									<td>Email : </td>
									<td>".$data['email']."</td>
								</tr>
								<tr>
									<td>Birthday : </td>
									<td>".$data['birthday']."</td>
								</tr>
								<tr>
									<td>Time Registration : </td>
									<td>".$data['time_reg']."</td>
								</tr>
								<tr>
									<td>Block Status : </td>
									<td>".$data['block_sts']."</td>
								</tr>
								<tr>
									<td>Reputation : </td>
									<td>".$data['reputation']."</td>
								</tr>
								<tr>
									<td>User Rank : </td>
									<td>".$data['user_rank']."</td>
								</tr>
							</table>
		    			</div>
		    			<a href='unBlockUser.php?id=".$data['id_num']."'><button class='unblock'>Unblock</button></a>
			    	</div>
			  	</div>
			</div>";
		}
		else if ($id == 3){
			echo "
			<table>
				<tr>
					<td class='pp'><img src='".$data['picture']."'></td>
					<td class='pp'><h4>".$data['title']."</h4></td>
					<td class='pp'><a href='#'><img src='img/setting.png' class='gear' id='".$data['topic_id']."'></a></td>
				</tr>
			</table>
			<div class='myModal' class='modal' style='display: none;'>
			 	<div class='modal-content'>
			    	<div class='modal-header'>
			      		<span class='close'>&times;</span>
			      		<h2>Setting</h2>
			    	</div>
			    	<div class='modal-body'>
		    			<h2>Report By : </h2>
		    			<div id='detail'>
		    				<table>
		    					<tr>
		    						<td>".$data['id_user']."</td>
		    						<td>".$data['reason']."</td>
		    					</tr>
		    				</table>
		    			</div>
		    			<button class='block'>Block</button>
		    			<button class='delete'>Delete</button>
			    	</div>
			  	</div>
			</div>";
		}
		else if ($id == 4){
			echo "
			<table>
				<tr>
					<td class='pp'><img src='".$data['picture']."'></td>
					<td class='pp'><h4>".$data['title']."</h4></td>
				</tr>
				<tr>
					<td style='padding-right:70px;'></td>
					<td><a href = unBlockPost.php?id=".$data['topic_id'].">Unblock Post</a></td>
				</tr>
			</table>";
		}
		else if ($id == 5){
			echo "
			<table>
				<tr>
					<td class='pp'><img src='".$data['picture']."'></td>
					<td class='pp'><h4>".$data['title']."</h4></td>
				</tr>
				<tr>
					<td style='padding-right:70px;'></td>
					<td><a href = unDeletePost.php?id=".$data['topic_id'].">Undelete Post</a></td>
				</tr>
			</table>";
		}
	}
?>