<?php

    if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
        header('Location: view');
        exit;
    }

   include 'navigator.php';

?>

<!DOCTYPE html>
<html lang="en">

	<head>
		
		<link rel="preconnect" href="https://fonts.googleapis.com">
		<link href="https://fonts.googleapis.com/css2?family=Hubballi&family=Oxygen:wght@300&family=Roboto+Mono:wght@200&display=swap" rel="stylesheet">
		<link rel="stylesheet" href="css/viewer.css" />
		
	</head>

	<body>
	
		<main>
			<?php

				error_reporting(0);

				//get the file
				$file = $_FILES['file'];
				$dir = $file['tmp_name'];
			?>

			<br><br><br>

			<h1><?php echo strtok($file['name'], '.'); ?></h1>

			<br><br><br>

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

			<br><br><br>

			<div id="itemDiv">

				<table style="width: 80%;">
				
					<tr>
						<th><b>CMD:</b></th>
						<th><b>Item:</b></th>
						<th><b>Texture name:</b></th>
						<th><b>Found Texture:</b></th>
						<th><b>CMD:</b></th>
						<th><b>Item:</b></th>
						<th><b>Texture name:</b></th>
						<th><b>Found Texture:</b></th>
					</tr>
				
					<?php

						//create data collector
						$referenceCollertor = [];
						$imgCollector = array();
						$cmdCollector = array();
						$optiEntCollector = array();
						$charCollector = array();
						$blockCollector = array();
						
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

										//Block textures
										if (str_contains($fileName, 'assets/minecraft/textures/')) {
											if (!str_contains($fileName, '/block/') && !str_contains($fileName, '/custom/')) {
												$blockName = str_replace('.png', '', str_replace('assets/minecraft/textures/', '', $fileName));
												array_push($blockCollector, $blockName);
											}
										}

									//collect all references
									} else if (substr($fileName, -5) === '.json') {
										//CMD textures
										if (!str_contains(str_replace('assets/minecraft/models/item/', '', $fileName), "/")) {
											$contents = zip_entry_read($zip_entry, $chuckSize);
											$json0 = json_decode($contents, true);
											$array = $json0['overrides'];
											for ($i = 0; $i < count($array); $i++) {
												//get all items
												$modelReference = $array[$i]['model'];
												$pathList = explode("/", $modelReference);
												$textureName = end($pathList);
												array_push($referenceCollertor, $textureName);

												//get refering item
												$pathList = explode("/", $fileName);
												$item = str_replace('.json', '', end($pathList));
												$itemCollector[$textureName] = $item;

												//get refering cmd
												$cmdCollector[$textureName] = $array[$i]['predicate']['custom_model_data'];
											}
										} else if (!str_contains(str_replace('assets/minecraft/font/', '', $fileName), "/")) {
											//Char textures
											$contents = zip_entry_read($zip_entry, $chuckSize);
											$json0 = json_decode($contents, true);
											$array = $json0['providers'];
											for ($i = 0; $i < count($array); $i++) {
												$charName = str_replace('"', '', json_encode($array[$i]['chars'][0]));
												$pathList = explode("/", $array[$i]['file']);
												$charCollector[$charName] = str_replace('.png', '', end($pathList));
											}
										}
									//Optifine mobs
									} else if (substr($fileName, -11) === '.properties') {
										$pathList = explode("/", $fileName);
										$entName = str_replace('.properties', '', end($pathList));
										$optiEntCollector[$entName] = array(zip_entry_read($zip_entry, $chuckSize), $entName);
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
								echo '<td>'.$itemCollector[$ref].'</td>';
								echo '<td>'.$ref.'</td>';
								echo '<td>'.'<img style="image-rendering: pixelated;" src="'.$imgCollector[$ref].'" alt="Not found" height="50" width="50" onerror="this.src=`media/notFound.png`;">'.'</td>';
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
						$amount = 1;
						foreach ($blockCollector as $block) {
							$amount++;
							if ($amount % 2 == 0) {
								echo "</tr>";
								echo "<tr>";
							}
							$pathList = explode("/", $block);
							echo '<td>'.$block.'</td>';
							echo '<td><img style="image-rendering: pixelated;" src="'.$imgCollector[end($pathList)].'" alt="Not found" height="50" width="50" onerror="this.src=`media/notFound.png`;">'.'</td>';
						}
					?>
				</table>
			</div>

			<div id="entityDiv" style="display: none">
				<table id="entityTable" style="width:40%;">
					
					<tr>
						<td><b>Entity:</b></td>
						<td><b>Optifine name:</b></td>
						<td><b>Found Texture:</b></td>
						<td><b>Entity:</b></td>
						<td><b>Optifine name:</b></td>
						<td><b>Found Texture:</b></td>
					</tr>

					<?php
						$amount = 1;
						foreach ($optiEntCollector as $optiEnt) {
							$string0 = parse_ini_string($optiEnt[0]);
							for ($i = 0; $i < count($string0); $i++) {
								if ($string0['name.'.$i] !== null) {
									$amount++;
									if ($amount % 2 == 0) {
										echo "</tr>";
										echo "<tr>";
									}
									echo '<td>'.$optiEnt[$amount].'</td>';
									echo '<td>'.str_replace("*", "", str_replace("ipattern:", "", $string0['name.'.$i].'</td>'));
									echo '<td><img style="image-rendering: pixelated;" src="'.$imgCollector[$optiEnt[1].$string0['textures.'.$i]].'" alt="Not found" height="50" width="50" onerror="this.src=`media/notFound.png`;"></td>';
								}
							}
						}
					?>
				</table>
			</div>

			<div id="fontDiv" style="display: none">
				<table id="fontTable" style="width:40%;">
					
					<tr>
						<td><b>Char code:</b></td>
						<td><b>Char name:</b></td>
						<td><b>Found Texture:</b></td>
						<td><b>Char code:</b></td>
						<td><b>Char name:</b></td>
						<td><b>Found Texture:</b></td>
					</tr>
					<?php
						$amount = 1;
						foreach ($charCollector as $char) {
							if ($amount % 2 == 0) {
								echo "</tr>";
								echo "<tr>";
							}
							echo '<td>'.array_search($char, $charCollector).'</td>';
							echo '<td>'.$char.'</td>';
							echo '<td><img style="image-rendering: pixelated;" src="'.$imgCollector[$char].'" alt="Not found" height="50" width="50" onerror="this.src=`media/notFound.png`;">'.'</td>';
						}
					?>
				</table>
			</div>

			<div id="allDiv" style="display: none; justify-content: center; width: 100vw;" >
				<?php

					foreach($imgCollector as $img) {
						echo '<img style="image-rendering: pixelated;" src="'.$img.'" alt="Texture" height="50" width="50">';
					}

				?>
			</div>
			
			<br><br><br>

			<button class="button" onclick="window.location.href='view.php';">< Back</button>
			
			<br><br>
		</main>
	</body>
</html>