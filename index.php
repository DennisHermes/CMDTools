<!DOCTYPE html>
<html lang="en">
	<head>
		
		<?php
			include 'shared/navigator.html';
		?>

		<title>Dannus Network</title>

		<link rel="stylesheet" href="css/index.css" />

	</head>

	<body>

		<div class="left">
			<br><br>
			<h1>CMDTools</h1>
			<br>
			<h2>Add <a class="typed" style="font-weight: bolder;"></a> to your server without overwriting any other ones!</h2>
			<br><br><br><br><br><br>
			<button class="cta">See how it works ></button>
		</div>

		<div class="right">
			<img src="media/hero.png" class="hero" alt="hero">
		</div>

		<img src="media/lines.svg" style="transform: translateY(5px);" alt="lines">

		<main>

			<br><br><br><br><br><br><br>

			<h2>Let me show you the new possibilities...</h2>

			<br><br><br><br>
	
			<div class="bigSmallWrapper">

					<div class="big">
						<h3>Create new items</h3>
						<p>Add new food, new payment methods, new materials or maybe completely new armor and tools sets to your server!</p>
						<br><br>
						<a href="contact">Start creating →</a>
					</div>

					<div class="small">
						<img src="media/items.gif" class="display" alt="content">
					</div>

			</div>

			<br><br><br><br><br><br><br><br>

			<div class="bigSmallWrapper">

					<div class="small">
						<img src="media/server.svg" class="display" alt="server">
					</div>

					<div class="big">
						<h3>Server Content Creation</h3>
						<p>In collaboration with Twitch streamers and Youtubers, we create content for gaming servers. New in-game items and features keep your audience interested.</p>
						<br><br>
						<a href="contact">Get in touch and upgrade your server →</a>
					</div>

			</div>

			<br><br><br><br><br><br><br><br>

			<div class="bigSmallWrapper">

					<div class="big">
						<h3>Complete Website Development</h3>
						<p>In this time it's all about the online world. Together with several companies, we put their brand strongly in the online world. We create websites and web shops in all shapes and sizes and exactly how you want them.</p>
						<br><br>
						<a href="contact">Get in touch and upgrade your online brand →</a>
					</div>

					<div class="small">
						<img src="media/website.svg" class="display" alt="website">
					</div>

			</div>

		</main>

		<script src="js/utilities/typed.js"></script>
		<script>
            window.ityped.init(document.querySelector('.typed'), {
                strings: ['items',  'entities', 'blocks'],
				typeSpeed: 150,
				backDelay: 1500,
				backSpeed: 75,
                loop: true
            });
        </script>

	</body>

	<footer>
        <p>© Dannus</p>
    </footer>

</html>