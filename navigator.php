<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@200&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

    <style>
        <?php include 'css/navigator.css'; ?>
    </style>

    <?php
        if (isset($_COOKIE["Profile_Color"])) {
            if ($_COOKIE["Profile_Color"] == null) {
                $hex = "#c8c8c8";
            } else {
                $hex = $_COOKIE["Profile_Color"];
            }
        } else {
            $hex = "#c8c8c8";
        }
        list($r, $g, $b) = sscanf($hex, "#%02x%02x%02x");
    ?>

</head>

<body>
    
    <style>
        .icon img {
            border-radius: 50%;
            background-color: rgba(<?php echo $r.','.$g.','.$b ?>, 0.6);
            height: 24px;
            width: 24px;
            border-radius: 50%;
            background-color: rgba(<?php echo $r.','.$g.','.$b ?>, 0.6);
            border: 1px solid rgba(255, 255, 255, 0.6);
            box-shadow: 0 0 0 2px rgba(<?php echo $r.','.$g.','.$b ?>, 0.6);
        }
    </style>

    <nav>
        <div class="logo">
            <h4>Adrewards</h4>
        </div>
        <ul class="navLinks">
            <li><a href="Index">Home</a></li>
            <li><a href="Dashboard">Dashboard</a></li>
            <li><a href="Instructions">Instructions</a></li>
            <li><a href="Support">Support</a></li>
            <?php
            if (isset($_COOKIE["Username"])) {
                if (substr($_SERVER["SCRIPT_NAME"],strrpos($_SERVER["SCRIPT_NAME"],"/")+1) == "Dashboard.php") $onclick = 'onclick="dashboardSwitch(3);" style="cursor: pointer;"'; else $onclick = 'href="Dashboard#account"';
                if (isset($_COOKIE["Minecraft_UUID"])) $skin = $_COOKIE["Minecraft_UUID"]; else $skin = "X-Steve";
                echo '<li><a '.$onclick.' class="icon"><img src="https://visage.surgeplay.com/bust/'.$skin.'"></img></a></li>';
            } else {
               echo '<li><a href="Login" class="icon"><i class="fa fa-user-circle" style="font-size:24px;"></i></a></li>';
            }
            ?>
        </ul>
        <div class="burger">
            <div class="line1"></div>
            <div class="line2"></div>
            <div class="line3"></div>
        </div>
    </nav>

    <script>
        <?php include 'JavaScript/navigator.js'; ?>
    </script>

</body>

</html>