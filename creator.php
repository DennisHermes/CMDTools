<?php

    if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
        //header('Location: create');
        //exit;
    }

   include 'navigator.php';

?>

<!DOCTYPE html>
<html lang="en">

	<head>
	
		<title>CMDTools - Create</title>

		<link rel="preconnect" href="https://fonts.googleapis.com">
		<link href="https://fonts.googleapis.com/css2?family=Hubballi&family=Oxygen:wght@300&family=Roboto+Mono:wght@200&display=swap" rel="stylesheet">
		<link rel="stylesheet" href="css/creator.css" />

	</head>

	<body>

		<div class="box1">
            <ul>
                <li><h1 class="title">What would you like to add?</h1></li>
            </ul>
        </div>

        <div class="box2">

            <div class="card" onclick="window.location.href = 'instructions';">
                <img src="SVG/guides.svg" alt="" />
                <div class="card-info">
                    <h2>Look at our guides</h2>
                    <p>We do our best to respond as quickly as possible but sometimes it can still take a long time. You can try to solve the problem yourself by taking a look at our guides.</p>
                </div>
                <h3>></h3>
            </div>

            <div class="card" onclick="window.location.href = 'contact';">
                <img src="SVG/support.svg" alt="" />
                <div class="card-info">
                    <h2>Take a look at our Spigot page</h2>
                    <p>On our spigot page there is a clear explanation of how AdRewards works. You will also be able to ask questions and read the questions of others.</p>
                </div>
                <h3>></h3>
            </div>

            <div class="card" onclick="window.open('https://www.spigotmc.org/', '_blank');">
                <img src="images/spigotmc.png" alt="" />
                <div class="card-info">
                    <h2>Get in touch with us</h2>
                    <p>If you really can't figure it out you can contact us. On average we respond within 3 working days.</p>
                </div>
                <h3>></h3>
            </div>

			<div class="card" onclick="window.open('https://www.spigotmc.org/', '_blank');">
                <img src="images/spigotmc.png" alt="" />
                <div class="card-info">
                    <h2>Get in touch with us</h2>
                    <p>If you really can't figure it out you can contact us. On average we respond within 3 working days.</p>
                </div>
                <h3>></h3>
            </div>
            <br>
        </div>

        <script>
            <?php include 'js/creator.js'; ?>
        </script>

	</body>

</html>