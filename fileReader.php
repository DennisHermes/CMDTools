<html>

	<head>
		
		<link rel="preconnect" href="https://fonts.googleapis.com">
		<link href="https://fonts.googleapis.com/css2?family=Roboto+Mono:wght@200&display=swap" rel="stylesheet">

		<link rel="stylesheet" href="css/fileReader.css" />
		
	</head>

	<body>
	
		<?php

			//get the file
			$file = $_FILES['file'];
			$dir = $file['tmp_name'];

		?>

		<br>
		<h1 style="color: whitesmoke; text-align: center; font-family: 'Roboto Mono', monospace;"><?php echo strtok($file['name'], '.'); ?></h1>
		<br><br><br><br>

		<div class="topnav">
		  <a id="item" onclick="change('item')" class="active">Items textures</a>
		  <a id="block" onclick="change('block')">Blocks textures</a>
		  <a id="entity" onclick="change('entity')">Optifine entities textures</a>
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

			<table style="width: 80%;">
			
				<tr>
					<th><b>CMD:</b></th>
					<th><b>Texture name:</b></th>
					<th><b>Found Texture:</b></th>
					<th><b>CMD:</b></th>
					<th><b>Texture name:</b></th>
					<th><b>Found Texture:</b></th>
				</tr>
			
				<?php

					//error_reporting(0);

					//create data collector
					$referenceCollertor = [];
					$imgCollector = array();
					$cmdCollector = array();
					
					//start reading zip
					$zip = zip_open($dir);
					if ($zip) {
						while ($zip_entry = zip_read($zip)) {
							if (zip_entry_open($zip, $zip_entry)) {

								//save default data
								$fileName = zip_entry_name($zip_entry);
								$chuckSize = (zip_entry_filesize($zip_entry) + 1024);

								//collect all textures
								if (substr($fileName, -4) === '.png') {
									$contents = zip_entry_read($zip_entry, $chuckSize);
									$base64 = 'data:image/png;base64,' . base64_encode($contents);
									$pathList = explode("/", $fileName);
									$textureName = str_replace(".png", "", end($pathList));
									$imgCollector[$textureName] = $base64;

								//collect all references
								} else if (substr($fileName, -5) === '.json') {
									if (!strpos(str_replace('assets/minecraft/models/item/', '', $fileName), "/")) {
										$contents = zip_entry_read($zip_entry, $chuckSize);
										$json0 = json_decode($contents, true);
										$array = $json0['overrides'];
										for ($i = 0; $i < count($array); $i++) {
											$modelReference = $json0['overrides'][$i]['model'];
											$pathList = explode("/", $modelReference);
											$textureName = end($pathList);
											array_push($referenceCollertor, $textureName);
											$cmdCollector[$textureName] = $json0['overrides'][$i]['predicate']['custom_model_data'];
										}
									}
								}
							}
							zip_entry_close($zip_entry);
						}
						zip_close($zip);

						//glueing things together
						$amount = 1;
						foreach ($referenceCollertor as $ref) {
							$amount++;
							if ($amount % 2 == 0) {
								echo "</tr>";
								echo "<tr>";
							}
							echo '<td>'.$cmdCollector[$ref].'</td>';
							echo '<td>'.$ref.'</td>';
							echo '<td>'.'<img style="image-rendering: pixelated;" src="'.$imgCollector[$ref].'" alt="test" height="50" width="50" onerror="this.src=`notFound.png`;">'.'</td>';
						}
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

				foreach($imgCollector as $img) {
					echo '<img style="image-rendering: pixelated;" src="'.$img.'" alt="test" height="50" width="50">';
				}

			?>
		</div>
		
		<br>
		<button class="button" onclick="window.location.href='index.php';">< Back</button>
		
		<br><br>
	</body>
</html>