<?php
	include "header.php";

	$id = $_GET['id'];
	$idTopic = $_GET['idTopic'];
	$sql = "SELECT * from topic where topic_id = ".$idTopic;
	$res = mysqli_query($conn, $sql);
	$data = mysqli_fetch_assoc($res);

?>

<!DOCTYPE html>
<html>
<head>
	
</head>
<body>
	<div class="type">
		<div class="border">
			<form action="editPostToDB.php?id=<?php echo $id?>&idTopic=<?php echo $idTopic;?>" method="POST">
				<input type="text" name="title" id="title" value="<?php echo $data['title'];?>">
				<ul>
					<li style="padding-right: 20px;">
						<select id="font">
							<option value="arial">Arial</option>
							<option value="arialBlack">Arial Black</option>
							<option value="courier">Courier</option>
							<option value="cursive">Cursive</option>
							<option value="georgia">Georgia</option>
							<option value="impact">Impact</option>
							<option vaule="monospace">Monospace</option>
							<option value="sans">Sans Serif</option>
							<option value="tahoma">Tahoma</option>
							<option value="verdana">Verdana</option>
						</select>
					</li>
					<li style="padding-right: 20px;">
						<select id="size">
							<option value="8">8</option>
							<option value="9">9</option>
							<option value="10">10</option>
							<option value="11" selected="">11</option>
							<option value="12">12</option>
							<option value="14">14</option>
							<option value="16">16</option>
							<option value="18">18</option>
							<option value="24">24</option>
							<option value="30">30</option>
							<option value="36">36</option>
							<option value="48">48</option>
							<option value="60">60</option>
							<option value="72">72</option>
							<option value="96">96</option>
						</select>
					</li>
					<li><button id="bold" style="font-weight: bold;" class="toolbar">B</button></li>
					<li><button id="italic" style="font-style: italic;" class="toolbar">I</button></li>
					<li style="padding-right: 20px;"><button id="underline" style="text-decoration: underline;" class="toolbar">U</button></li>
					<li><button id="left""><img src="img/left.png" class="textAlign" class="toolbar"></button></li>
					<li><button id="center""><img src="img/center.png" class="textAlign" class="toolbar"></button></li>
					<li><button id="right""><img src="img/right.png" class="textAlign" class="toolbar"></button></li>
					<li><button id="justify"><img src="img/justify.png" class="textAlign" class="toolbar"></button></li>
					<li><button id="post" name="edit" class="button" style="width:100px; height:30px;">POST</button></li>
				</ul>
				<br><br>
				<img src="<?php echo $data['picture'];?>" class="pictureType left">
				<input type="file" name="pict" class="left" value="<?php echo $data['picture'];?>">
				<input type="text" name="category" value="<?php echo $data['category'];?>">
				<div style="width: 100%;">
					<textarea rows="50" cols="150" id="content" name="content">
						<?= $data['content'];?>
					</textarea>
				</div>
			</form>
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

<script type="text/javascript">
	$(document).ready(function(){
		$post = $("#post");
		$b = false;
		$i = false;
		$u = false;
		$text = $("#content");
		$title = $("#title");

		$post.click(function(){
			alert("Your post is updated");
		});

		$font = $("#font");
		$font.on('change', function(){
			switch(this.value){
				case "arial": $text.css("font-family", "arial"); break;
				case "arialBlack": $text.css("font-family", "arial-black"); break;
				case "courier": $text.css("font-family", "courier"); break;
				case "cursive": $text.css("font-family", "cursive"); break;
				case "georgia": $text.css("font-family", "georgia"); break;
				case "impact": $text.css("font-family", "impact"); break;
				case "monospace": $text.css("font-family", "monospace"); break;
				case "sans": $text.css("font-family", "sans-serif"); break;
				case "tahoma": $text.css("font-family", "tahoma"); break;
				case "verdana": $text.css("font-family", "verdana"); break;
			}
		});

		$size = $("#size");
		$size.on('change', function(){
			switch(this.value){
				case "8": $text.css("font-size", 12); break;
				case "9": $text.css("font-size", 13); break;
				case "10": $text.css("font-size", 14); break;
				case "11": $text.css("font-size", 15); break;
				case "12": $text.css("font-size", 16); break;
				case "14": $text.css("font-size", 18); break;
				case "16": $text.css("font-size", 20); break;
				case "18": $text.css("font-size", 22); break;
				case "24": $text.css("font-size", 28); break;
				case "30": $text.css("font-size", 34); break;
				case "36": $text.css("font-size", 40); break;
				case "48": $text.css("font-size", 52); break;
				case "60": $text.css("font-size", 64); break;
				case "72": $text.css("font-size", 76); break;
				case "96": $text.css("font-size", 100); break;
			}
		});

		$bold = $("#bold");
		$bold.click(function(){
			if ($b == true){
				$bold.css("background-color", "lightgrey");
				$text.css("font-weight", "normal");
				$b = false;
			}
			else{
				$bold.css("background-color", "grey");
				$text.css("font-weight", "bold");
				$b = true;
			}
		});

		$italic = $("#italic");
		$italic.click(function(){
			if ($i == true){
				$italic.css("background-color", "lightgrey");
				$text.css("font-style", "normal");
				$i = false;
			}
			else{
				$italic.css("background-color", "grey");
				$text.css("font-style", "italic");
				$i = true;
			}
		});

		$underline = $("#underline");
		$underline.click(function(){
			if ($u == true){
				$underline.css("background-color", "lightgrey");
				$text.css("text-decoration", "none");
				$u = false;
			}
			else{
				$underline.css("background-color", "grey");
				$text.css("text-decoration", "underline");
				$u = true;
			}
		});

		$left = $("#left");
		$left.click(function(){
			$left.css("background-color", "grey");
			$center.css("background-color", "lightgrey");
			$right.css("background-color", "lightgrey");
			$justify.css("background-color", "lightgrey");
			$text.css("text-align", "left");
		});

		$center = $("#center");
		$center.click(function(){
			$left.css("background-color", "lightgrey");
			$center.css("background-color", "grey");
			$right.css("background-color", "lightgrey");
			$justify.css("background-color", "lightgrey");
			$text.css("text-align", "center");
		});

		$right = $("#right");
		$right.click(function(){
			$left.css("background-color", "lightgrey");
			$center.css("background-color", "lightgrey");
			$right.css("background-color", "grey");
			$justify.css("background-color", "lightgrey");
			$text.css("text-align", "right");
		});

		$justify = $("#justify");
		$justify.click(function(){
			$left.css("background-color", "lightgrey");
			$center.css("background-color", "lightgrey");
			$right.css("background-color", "lightgrey");
			$justify.css("background-color", "grey");
			$text.css("text-align", "justify");
		});
	});
</script>