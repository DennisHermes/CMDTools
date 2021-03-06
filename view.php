<?php include 'navigator.php'; ?>

<!DOCTYPE html>
<html lang="en">

	<head>

		<title>CMDTools - View</title>
	
		<link rel="preconnect" href="https://fonts.googleapis.com">
		<link href="https://fonts.googleapis.com/css2?family=Hubballi&family=Oxygen:wght@300&family=Roboto+Mono:wght@200&display=swap" rel="stylesheet">
		<link rel="stylesheet" href="css/view.css" />

	</head>

	<body>

		<div class="slider" id="slider">
			<div class="content"></div>

			<div class="inner">

				<br><br><br>

				<h1>View CMD packs</h1>

				<br><br><br>

				<p>With this tool you can open your own or other existing CMD packs to see if they work correctly and contain the textures you want. It also allows you to copy textures from other CMD packs for your own use.*</p>

				<br><br><br><br>

				<form action="viewer" method="post" enctype="multipart/form-data">
					<h3>View CMD pack</h3>
					<br>
					<label for="file-upload" class="upload">
						<i class="fa fa-cloud-upload"></i> Select resource pack
					</label>
					<br><br>
					<p style="text-align: center; color: black; font-size: 15px;">(has to be .zip file)</p>
					<br><br>
					<p id="filename" style="text-align: center; color: black; font-size: 12px;">No file selected</p>
					<input onchange="document.getElementById('filename').innerHTML = document.getElementById('file-upload').files.item(0).name;" id="file-upload" name='file' type="file" accept=".zip"/>
					<br><br>
					<input type="submit" value="Look up">
				</form>

				<div class="bottomText">* CMDTools is not responsible for any copyright violations by using this tool.</div>
			</div>

			<div class="svgDiv" id="svgDiv">
				<img class="svg" src="media/read.svg">
			</div>
		</div>

		<script>
            <?php include 'js/viewAndCreate.js'; ?>
        </script>

	</body>

</html>