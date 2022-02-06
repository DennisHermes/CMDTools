<html>

	<head>
		
		<link rel="preconnect" href="https://fonts.googleapis.com">
		<link href="https://fonts.googleapis.com/css2?family=Roboto+Mono:wght@200&display=swap" rel="stylesheet">

		<link rel="stylesheet" href="css/fileReader.css" />
		
	</head>

	<body>
		<?php
			$file = $_FILES['file'];
		?>
	
		<br>
		<h1 style="color: whitesmoke; text-align: center; font-family: 'Roboto Mono', monospace;"><?php echo strtok($file['name'], '.'); ?></h1>
		<br><br><br><br>

		<div class="topnav">
		  <a id="item" onclick="change('item')" class="active">Items textures</a>
		  <a id="block" onclick="change('block')">Blocks textures</a>
		  <a id="entity" onclick="change('entity')">Entities textures</a>
		  <a id="font" onclick="change('font')">Fonts textures</a>
		  <a id="all" onclick="change('all')">All found textures</a>
		</div>
		
		<script>
			function change(arg) {
				document.getElementById("item").classList.remove("active");
				document.getElementById("block").classList.remove("active");
				document.getElementById("entity").classList.remove("active");
				document.getElementById("font").classList.remove("active");
				document.getElementById("all").classList.remove("active");
				document.getElementById(arg).classList.add("active");

				document.getElementById("itemDiv").style.display = "none";
				document.getElementById("blockDiv").style.display = "none";
				document.getElementById("entityDiv").style.display = "none";
				document.getElementById("fontDiv").style.display = "none";
				document.getElementById("allDiv").style.display = "none";
				document.getElementById(arg + "Div").style.display = "block";
			}
		</script>

		<br><br>

		<div id="itemDiv">

			<h3><b style="color: red;">Warning!</b> Textures that refer to standard Minecraft textures are currently not displayed.</h3>
			
			<br><br>

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
					
					try {
						$amount1 = 0;
						$di2 = new RecursiveDirectoryIterator($dir.'/assets/minecraft/models/item');
						foreach (new RecursiveIteratorIterator($di2) as $filename => $file) {
							if (!$di2->isDir() AND substr($filename, -5) === '.json') {
								$string0 = file_get_contents($filename);
								$json0 = json_decode($string0, true);
								$array = $json0['overrides'];
								for ($i = 0; $i < count($array); $i++) {
									$string1 = file_get_contents($dir.'/assets/minecraft/models/'.$json0['overrides'][$i]['model'].'.json');
									$json1 = json_decode($string1, true);
									
									$amount1++;
									if ($i % 2 == 0) {
										echo "<tr>";
									}
									
									echo '<td>'.$json0['overrides'][$i]['predicate']['custom_model_data'].'</td>';
									echo '<td><img style="image-rendering: pixelated;" src="'.$dir.'/assets/minecraft/textures/'.str_replace("minecraft:", "", $json1['textures']['layer0']).'.png" alt="test" height="50" width="50" onerror="this.src=`notFound.png`;"></td>';
								}
							}
						}
						if ($amount1 == 0) {
							echo '<h3>No block textures found.</h3>';
							echo '<script>document.getElementById("blockTable").style.display = "none";</script>';
						}
					} catch (exception $e) {
						echo '<h3>No block textures found.</h3>';
						echo '<script>document.getElementById("blockTable").style.display = "none";</script>';
					}
				?>
			</table>
		</div>


		<div id="blockDiv" style="display: none">
			<table id="blockTable" style="width:40%;">
				
				<tr>
					<td><b>Block:</b></td>
					<td><b>Found Texture:</b></td>
					<td><b>Block:</b></td>
					<td><b>Found Texture:</b></td>
				</tr>
			
				<?php
					try {
						$di1 = new RecursiveDirectoryIterator($dir.'/assets/minecraft/textures');
						$i = 1;
						$amount2 = 0;
						foreach (new RecursiveIteratorIterator($di1) as $filename => $file) {
							if (substr($filename, -4) === '.png') {
								$splited = explode('\\', dirname($file));
								$folder = array_pop($splited);
								if (strcmp($folder, "block")) {
									if (strcmp($folder, "custom")) {
										
										$amount2++;
										if ($i % 2 == 0) {
											echo "<tr>";
										}
										echo '<td>'.$folder.'</td>';
										echo '<td><img style="image-rendering: pixelated;" src="'.$filename.'" alt="test" height="50" width="50" onerror="this.src=`notFound.png`;"></td>';
									}
								}
							}
							$i++;
						}
						if ($amount2 == 0) {
							echo '<h3>No block textures found.</h3>';
							echo '<script>document.getElementById("blockTable").style.display = "none";</script>';
						}
					} catch (exception $e) {
						echo '<h3>No block textures found.</h3>';
						echo '<script>document.getElementById("blockTable").style.display = "none";</script>';
					}
				?>
			</table>
		</div>

		<div id="entityDiv" style="display: none">
			<table id="entityTable" style="width:40%;">
				
				<tr>
					<td><b>Entity Name:</b></td>
					<td><b>Found Texture:</b></td>
					<td><b>Entity Name:</b></td>
					<td><b>Found Texture:</b></td>
				</tr>

				<?php
					try {
						$amount3 = 0;
						$di3 = new RecursiveDirectoryIterator($dir.'/assets/minecraft/optifine/random/entity');
						foreach (new RecursiveIteratorIterator($di3) as $filename => $file) {
							if (substr($filename, -11) === '.properties') {
								$string0 = parse_ini_file($filename);
								if ($amount3 % 2 == 0) {
									echo "<tr>";
								}
								echo '<td>'.str_replace("*", "", str_replace("ipattern:", "", $string0['name.1'].'</td>'));
								echo '<td><img style="image-rendering: pixelated;" src="'.str_replace(".properties", "", $filename).$string0['textures.1'].'.png" alt="test" height="50" width="50" onerror="this.src=`notFound.png`;"></td>';
								$amount3++;
							}
						}
						if ($amount3 == 0) {
							echo '<h3>No entity textures found.</h3>';
							echo '<script>document.getElementById("entityTable").style.display = "none";</script>';
						}
					} catch (exception $e) {
						echo '<h3>No entity textures found.</h3>';
						echo '<script>document.getElementById("entityTable").style.display = "none";</script>';
					}
				?>
			</table>
		</div>

		<div id="fontDiv" style="display: none">
			<table id="fontTable" style="width:40%;">
				
				<tr>
					<td><b>Chars:</b></td>
					<td><b>Found Texture:</b></td>
					<td><b>Chars:</b></td>
					<td><b>Found Texture:</b></td>
				</tr>
				<?php
					try {
						$amount4 = 0;
						$di4 = new RecursiveDirectoryIterator($dir.'/assets/minecraft/font');
						foreach (new RecursiveIteratorIterator($di4) as $filename => $file) {
							if (!$di4->isDir() AND substr($filename, -5) === '.json') {
								$string0 = file_get_contents($filename);
								$json0 = json_decode($string0, true);
								$array = $json0['providers'];
								for ($i = 0; $i < count($array); $i++) {
									$amount4++;
									if ($i % 2 == 0) {
										echo "<tr>";
									}
									
									$charArr = str_split($json0['providers'][$i]['chars'][0]);
									for ($i2 = 0; $i2 < count($charArr); $i2++) {
										$charVal = "&zwnj;".$charArr[$i2];
									}
									echo '<td>'.str_replace(']', '', str_replace('[', '', str_replace('"', '', json_encode($json0['providers'][$i]['chars'])))).'</td>';
									echo '<td><img style="image-rendering: pixelated;" src="'.$dir.'/assets/minecraft/textures/'.str_replace("minecraft:", "", $json0['providers'][$i]['file']).'" alt="test" height="50" width="50" onerror="this.src=`notFound.png`;"></td>';
								}
							}
						}
						if ($amount4 == 0) {
							echo '<h3>No font textures found.</h3>';
							echo '<script>document.getElementById("fontTable").style.display = "none";</script>';
						}
					} catch (exception $e) {
						echo '<h3>No font textures found.</h3>';
						echo '<script>document.getElementById("fontTable").style.display = "none";</script>';
					}
				?>
			</table>
		</div>

		<div id="allDiv" style="display: none;">
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