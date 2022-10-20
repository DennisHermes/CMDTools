<?php 
	include 'shared/navigator.php'; 
?>

<!DOCTYPE html>
<html lang="en">

	<head>

		<title>CMDTools - Plugins</title>
	
		<link rel="preconnect" href="https://fonts.googleapis.com">
		<link href="https://fonts.googleapis.com/css2?family=Hubballi&family=Oxygen:wght@300&family=Roboto+Mono:wght@200&display=swap" rel="stylesheet">
		<link rel="stylesheet" href="css/plugins.css" />

		<script src="https://code.iconify.design/2/2.2.1/iconify.min.js"></script>

	</head>

	<body>
		
		<br><br>

		<main>
			<div class="container" id="container1">
				<div class="card">
					<div class="img">
					<div class="circle"></div>
						<img src="media/easy.svg" alt="Installing plugin">
					</div>
					<div class="info">
						<h1 class="title">SetCMD</h1>
						<h3>This plugin is extremely lightweight but only contains the commands '/setcmd [CMD]' to change the texture of the item in your hand and '/cmdsite' to get a link to this site.</h3>
						<div class="next">
							<button onclick="window.location.href = 'installing';"><span class="iconify" data-icon="fa:download"></span> Download</button>
						</div>
					</div>
				</div>
			</div>
			<div class="container" id="container2">
				<div class="card">
					<div class="imgBlock">
					<div class="circleBlock"></div>
						<img src="media/advanced.svg" alt="Commands">
					</div>
					<div class="info">
						<h1 class="title">CMDTools</h1>
						<h3>with CMDTools you can use the simple functions of SetCMD but you can also add your own crafting recipes. This allows you to create a completely new experience from your server!</h3>
						<div class="next buttonBlock">
							<button><span class="iconify" data-icon="fa:download"></span> Available soon</button>
						</div>
					</div>
				</div>
			</div>
			<div class="container" id="container3" style="display: none;">
				<div class="card card3">
					<div class="imgPremium">
					<div class="circlePremium"></div>
						<img src="media/premium.svg" alt="Commands">
					</div>
					<div class="info">
						<h1 class="title">CMDTools</h1>
						<h3>with CMDTools you can use the simple functions of SetCMD but you can also add your own crafting recipes. This allows you to create a completely new experience from your server!</h3>
						<div class="next buttonPremium">
							<button><span class="iconify" data-icon="fa:download"></span> Available soon</button>
						</div>
					</div>
				</div>
			</div>
		</main>

		<script>
            <?php include 'js/plugins.js'; ?>
        </script>

	</body>

</html>