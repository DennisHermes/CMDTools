<html>

	<head>
		<style>
			* {
				margin: 0px;
				padding: 0px;
				-webkit-box-sizing: border-box;
						box-sizing: border-box;
				text-align: center !important;
				margin: auto !important;
			}
		
			table, th, td {
			  border:1px solid Silver;
			}
			
			body {
				min-height: 100vh;
				background: -webkit-gradient(linear, left bottom, left top, from(#8533bd), to(#c278c2));
				background: -o-linear-gradient(bottom, #8533bd, #c278c2);
				background: linear-gradient(to top, #8533bd, #c278c2);
				color: whitesmoke;
				
			}
			
			.topnav {
			  overflow: hidden;
			  width: 100%;
			  justify-content: center;
			  align-items: center;
			  text-align: center;
			  float: center;
			}

			.topnav a {
			  float: left;
			  display: block;
			  color: whitesmoke;
			  text-align: center;
			  padding: 14px 16px;
			  text-decoration: none;
			  font-size: 17px;
			  border-bottom: 3px solid transparent;
			  font-family: 'Roboto Mono', monospace;
			  cursor: pointer;
			}

			.topnav a:hover {
				border-bottom: 3px solid #7d0acc;
			}

			.topnav a.active {
				border-bottom: 3px solid #7d0acc;
			}
			
			.button {
				background-color: #c278c2;
				border: none;
				color: white;
				padding: 20px;
				text-align: center;
				text-decoration: none;
				display: inline-block;
				font-size: 16px;
				margin: 4px 2px;
				cursor: pointer;
				border-radius: 8px;
				transition: background-color 0.4s ease;
			}
			
			.button:hover {
				background-color: #9b3fba;
			}
		</style>
		
		<link rel="preconnect" href="https://fonts.googleapis.com">
		<link href="https://fonts.googleapis.com/css2?family=Roboto+Mono:wght@200&display=swap" rel="stylesheet">
		
	</head>

	<body>
		<?php
			$file = $_FILES['file'];
		?>
	
		<br>
		<h1 style="color: whitesmoke; text-align: center; font-family: 'Roboto Mono', monospace;"><?php echo strtok($file['name'], '.'); ?></h1>
		<br><br>

		<div class="topnav">
		  <a class="active">Home</a>
		  <a>News</a>
		  <a>Contact</a>
		</div>
		
		<br><br>

		<div id="items">
			<table style="width:40%;">
				
				<tr>
					<td><b>CMD:</b></td>
					<td><b>Found Texture:</b></td>
					<td><b>CMD:</b></td>
					<td><b>Found Texture:</b></td>
				</tr>
			
				<?php

					error_reporting(0);

					$dir = "tmp_".rand(0, 9).rand(0, 9).rand(0, 9).rand(0, 9);
					mkdir($dir, 0700);

					move_uploaded_file($file['tmp_name'], $dir."/".$file['name']);
					
					$zip = new ZipArchive;
					if ($zip->open($dir."/".$file['name']) === TRUE) {
						$zip->extractTo($dir);
						$zip->close();
					} else {
						echo 'failed';
					}
					
					$di = new RecursiveDirectoryIterator($dir.'/assets/minecraft/models/item');
					foreach (new RecursiveIteratorIterator($di) as $filename => $file) {
						if (!$di->isDir() AND substr($filename, -5) === '.json') {
							$string0 = file_get_contents($filename);
							$json0 = json_decode($string0, true);
							$array = $json0['overrides'];
							for ($i = 0; $i < count($array); $i++) {
								$string1 = file_get_contents($dir.'/assets/minecraft/models/'.$json0['overrides'][$i]['model'].'.json');
								$json1 = json_decode($string1, true);
								
								if ($i % 2 == 0) {
									echo "<tr>";
								}
								
								echo '<td>'.$json0['overrides'][$i]['predicate']['custom_model_data'].'</td>';
								echo '<td><img style="image-rendering: pixelated;" src="'.$dir.'/assets/minecraft/textures/'.str_replace("minecraft:", "", $json1['textures']['layer0']).'.png" alt="test" height="50" width="50"></td>';
							}
						}
					}
					
				?>
			</table>
		</div>


		<div id="blocks" style="display: none">
			<table style="width:40%;">
				
				<tr>
					<td><b>Block:</b></td>
					<td><b>Found Texture:</b></td>
					<td><b>Block:</b></td>
					<td><b>Found Texture:</b></td>
				</tr>
			
				<?php
				
					$di1 = new RecursiveDirectoryIterator($dir.'/assets/minecraft/textures');
					$i = 1;
					foreach (new RecursiveIteratorIterator($di1) as $filename => $file) {
						if (substr($filename, -4) === '.png') {
							$splited = explode('\\', dirname($file));
							$folder = array_pop($splited);
							if (strcmp($folder, "block")) {
								if (strcmp($folder, "custom")) {
									
									if ($i % 2 == 0) {
										echo "<tr>";
									}
									echo '<td>'.$folder.'</td>';
									echo '<td><img style="image-rendering: pixelated;" src="'.$filename.'" alt="test" height="50" width="50"></td>';
								}
							}
						}
						$i++;
					}
					
				?>
			</table>
		</div>

		<div id="all" style="display: none;">
			<?php

				$di0 = new RecursiveDirectoryIterator($dir.'/assets');
				foreach (new RecursiveIteratorIterator($di0) as $filename => $file) {
					if (substr($filename, -4) === '.png') {
						echo '<img style="image-rendering: pixelated;" src="'.$filename.'" alt="test" height="50" width="50">';
					}
				}

			?>
		</div>
		
		<br>
		<button class="button" onclick="window.location.href='index.php';">< Back</button>
		
		<br><br>
	</body>
</html>