<?php include 'navigator.php'; ?>

<!DOCTYPE html>
<html lang="en">

	<head>
	
		<link rel="preconnect" href="https://fonts.googleapis.com">
		<link href="https://fonts.googleapis.com/css2?family=Hubballi&family=Oxygen:wght@300&family=Roboto+Mono:wght@200&display=swap" rel="stylesheet">
		<link rel="stylesheet" href="css/read.css" />

	</head>

	<body>
		<div class="content">
			<form action="fileReader.php" method="post" enctype="multipart/form-data">
				<label for="file-upload" class="custom-file-upload">
					<i class="fa fa-cloud-upload"></i> Select resource pack
				</label>
				<br><br>
				<p style="text-align: center; color: black; font-size: 15px;">(has to be .zip file)</p>
				<br><br>
				<p id="filename" style="text-align: center; color: black; font-size: 12px;">No file selected</p>
				<input onchange="document.getElementById('filename').innerHTML = document.getElementById('file-upload').files.item(0).name;" id="file-upload" name='file' type="file"/>
				<br><br>
				<input type="submit" value="Look up">
			</form>
		</div>
	</body>

</html>