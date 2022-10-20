<?php 
	include 'shared/navigator.php'; 
?>

<!DOCTYPE html>
<html lang="en">

	<head>
	
		<title>CMDTools - Create</title>

		<link rel="preconnect" href="https://fonts.googleapis.com">
		<link href="https://fonts.googleapis.com/css2?family=Hubballi&family=Oxygen:wght@300&family=Roboto+Mono:wght@200&display=swap" rel="stylesheet">
		<link rel="stylesheet" href="css/create.css" />

	</head>

	<body>

		<div class="slider" id="slider">
			<div class="content"></div>

			<div class="inner">

				<br><br><br>

				<h1>Create CMD packs</h1>

				<br><br><br>

				<p>With this tool you can create your own CMD packs. You can add any items you want to your Minecraft server. Add new food, armor, weapons, and so on! The possibilities are endless! You can also add completely new entities, chat characters and blocks.</p>

				<br><br><br><br>

				<form action="creator" method="post" enctype="multipart/form-data">
					<h3>Create CMD pack</h3>
					<br><br>
					<p style="font-size: 18px;">Name:</p>
					<br>
					<input type="text" placeholder="CMD pack name..." required>
					<br><br><br>
					<p style="font-size: 18px;">CMD pack description:</p>
					<br>
					<input type="text" placeholder="First line..." required>
					<input type="text" placeholder="Second line...">
					<br>
					<p style="font-size: 15px;">You can use color codes with '&'.</p>
					<br><br><br>
					<input type="submit" value="Start creating!">
				</form>
			</div>

			<div class="svgDiv" id="svgDiv">
				<img style="float: right;" class="svg" src="media/create.svg">
			</div>
		</div>

		<script>
            <?php include 'js/viewAndCreate.js'; ?>
        </script>

	</body>

</html>