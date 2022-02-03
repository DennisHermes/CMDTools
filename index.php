<html>

	<head>
	
		<style>
			* {
				margin: 0px;
				padding: 0px;
				-webkit-box-sizing: border-box;
						box-sizing: border-box;
			}
			
			body {
				min-height: 100vh;
				background: -webkit-gradient(linear, left bottom, left top, from(#5b1180), to(#c278c2));
				background: -o-linear-gradient(bottom, #5b1180, #c278c2);
				background: linear-gradient(to top, #5b1180, #c278c2);
				justify-content: center;
				align-items: center;
				display: flex;
				min-width: 100vw;
			}

			ul {
				list-style-type: none;
			}

			.content {
				text-align: center;
				background: whitesmoke;
				border-radius: 5px;
				padding: 2rem 2rem 0.5rem 2rem;
				color: #383838;
				min-width: 20%;
			}

			.content input[type=submit] {
				font-family: 'roboto', Sans-Serif;
				width: 100%;
				text-align: center;
				background-color: #9b3fba;
				color: white;
				padding: 14px 20px;
				border: none;
				border-radius: 4px;
				cursor: pointer;
				transition: background-color 0.4s ease;
				-webkit-appearance: none;
				-moz-appearance: none;
				appearance: none;
			}

			input[type=submit]:hover {
				background-color: #c278c2;
			}
			
			input[type="file"] {
				display: none;
			}
			.custom-file-upload {
				border: 1px solid #ccc;
				display: inline-block;
				padding: 6px 12px;
				cursor: pointer;
			}
		</style>
	
		<link rel="preconnect" href="https://fonts.googleapis.com">
		<link href="https://fonts.googleapis.com/css2?family=Roboto+Mono:wght@200&display=swap" rel="stylesheet">
	
	</head>

	<body>
		<?php
			foreach (glob("tmp_*") as $filename) {
				deleteDir($filename);
			}
			
			function deleteDir($dirPath) {
				if (! is_dir($dirPath)) {
					throw new InvalidArgumentException('$dirPath must be a directory');
				}
				if (substr($dirPath, strlen($dirPath) - 1, 1) != '/') {
					$dirPath .= '/';
				}
				$files = glob($dirPath . '*', GLOB_MARK);
				foreach ($files as $file) {
					if (is_dir($file)) {
						deleteDir($file);
					} else {
						unlink($file);
					}
				}
				rmdir($dirPath);
			}
		?>
		
		<ul style="min-width: 20%;">
			<li style="min-width: 20%;">
				<h1 class="Title" style="text-align: center; color: whitesmoke; font-size: 50px; font-family: 'Roboto Mono', monospace;">CMDTool</h1>
			
				<div class="content">
					<form action="fileReader.php" method="post" enctype="multipart/form-data">
						<label for="file-upload" class="custom-file-upload">
							<i class="fa fa-cloud-upload"></i> Select resource pack
						</label>
						<br><br>
						<p style="text-align: center; color: black; font-size: 15px; font-family: 'Roboto Mono', monospace;">(has to be .zip file)</p>
						<br><br>
						<p id="filename" style="text-align: center; color: black; font-size: 12px; font-family: 'Roboto Mono', monospace;">No file selected</p>
						<input onchange="document.getElementById('filename').innerHTML = document.getElementById('file-upload').files.item(0).name;" id="file-upload" name='file' type="file"/>
						<br><br>
						<input type="submit" value="Look up">
					</form>
				</div>
			</li>
			<li>
				<p class="madeBy" style="text-align: center; color: whitesmoke; font-size: 15px; font-family: 'Roboto Mono', monospace;">Made by Dannus - V1.0</p>
			</li>
			
		<ul>
	</body>

</html>