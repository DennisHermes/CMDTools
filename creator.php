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

        <script src="https://code.iconify.design/2/2.2.1/iconify.min.js"></script>

	</head>

	<body>

		<div class="box1">
            <ul>
                <li><h1 id="title" class="title">What would you like to add?</h1></li>
            </ul>
        </div>

        <div id="box2" class="box2">

            <div id="item" class="card" onclick="openCreator('item');">
                <img src="media/item.png" alt="" />
                <div class="card-info">
                    <h2>Add an item</h2>
                </div>
                <h3 class="arrow">></h3>
            </div>

            <div id="block" class="card" onclick="openCreator('block');">
                <img src="media/block.png" alt="" />
                <div class="card-info">
                    <h2>Retexture a block</h2>
                </div>
                <h3 class="arrow">></h3>
            </div>

            <div id="entity" class="card" onclick="openCreator('entity');">
                <img style="width: 3.5vw" src="media/entity.png" alt="" />
                <div class="card-info">
                    <h2>Add an entity</h2>
                </div>
                <h3 class="arrow">></h3>
            </div>

			<div id="character" class="card" onclick="openCreator('character');">
                <img src="media/characters.png" alt="" />
                <div class="card-info">
                    <h2>Add a character</h2>
                </div>
                <h3 class="arrow">></h3>
            </div>
            <br>
        </div>

        <div id="itemDiv" class="divs">
            <br>
            <h2>Select an base item</h2>
            <br>
            <div class="tooltip"><span class="iconify" data-icon="akar-icons:info"></span>
                <span class="tooltiptext">Select the item you want as a base. This is important if you want to recreate other items, such as a new type of food, then select: beef, chicken or maybe golden apple. Or use rabbit foot if you want it to have no crafting recipe.</span>
            </div>
            <br>
            <input list="itemList" id="itemID" autocomplete="off" onchange="Check();" required>
            <datalist id="itemList">
                <?php 
                    $contents = file("lists/1.18/items.txt");
                    foreach($contents as $line) {
                        echo("<option value='".$line."'>");
                    }
                ?>
            </datalist>
            <br><br>
            <h2>Enter your wanted CMD value of the texture</h2>
            <br>
            <div class="tooltip"><span class="iconify" data-icon="akar-icons:info"></span>
                <span class="tooltiptext">The CMD value you give the texture corresponds to the CMD value of the item. If you give the item a certain CMD value, it will show a different texture. Make sure that you do not give multiple textures for the same CMD value on the same item. The default CMD value for items is 0.</span>
            </div>
            <br>
            <input id="itemCMD" type="number" autocomplete="off" onchange="Check();" required>
            <br><br>
            <h2>Upload your texture</h2>
            <br>
            <div class="tooltip"><span class="iconify" data-icon="akar-icons:info"></span>
                <span class="tooltiptext">Upload the texture that you want. Minecraft uses .png files as textures. By default Minecraft uses textures of 16 by 16 pixels.</span>
            </div>
            <br>
            <label name="itemTexture" for="itemTexture" class="upload">
                <i class="fa fa-cloud-upload"></i> Select resource pack
            </label>
            <br><br>
            <p style="text-align: center; color: black; font-size: 15px;">(has to be .png file)</p>
            <p id="filename" style="text-align: center; color: black; font-size: 12px;">No file selected</p>
            <br>
            <input onchange="document.getElementById('filename').innerHTML = document.getElementById('itemTexture').files.item(0).name; Check();" id="itemTexture" type="file" accept=".png"/>
            <br>
            <button>Cancel</button>
            <button id="addItemButton" disabled>Add item</button>
        <div>

        <script>
            let allowedValues = [
                <?php 
                    $contents = file("lists/1.18/items.txt");
                    foreach($contents as $line) {
                        echo ("'".trim(preg_replace('/\s\s+/', ' ', $line))."', ");
                    }
                ?>
            ]

            function Check() {
                var valid = document.getElementById('itemID').value.length !== 0 &&
                allowedValues.includes(document.getElementById('itemID').value) &&
                document.getElementById('itemCMD').value !== "" &&
                document.getElementById('itemTexture').value !== ""

                document.getElementById('addItemButton').disabled = !valid;
            }
        </script>

        <script>
            function openCreator(tab) {
                document.getElementById("title").style.transform = "translateX(-100vw)";
                if (tab != 'item') document.getElementById("item").style.transform = "translateX(-100vw)";
                if (tab != 'block') document.getElementById("block").style.transform = "translateX(-100vw)";
                if (tab != 'entity') document.getElementById("entity").style.transform = "translateX(-100vw)";
                if (tab != 'character') document.getElementById("character").style.transform = "translateX(-100vw)";
                setTimeout(() => {
                    var bodyRect = document.body.getBoundingClientRect();
                    var elemRect = document.getElementById(tab).getBoundingClientRect();
                    var offset = (elemRect.top - bodyRect.top) - (document.documentElement.clientHeight * 0.09);

                    document.getElementById(tab).style.transform = "translateY(-" + offset +"px)";

                    document.getElementById("box2").style.height = "1px";

                    const arrows = document.querySelectorAll('.arrow');
                    arrows.forEach((arrow, index) => {
                        arrow.style.opacity = "0.00001";
                    });
                }, 500);
                setTimeout(() => {
                    document.getElementById(tab + "Div").style.display = "block";
                }, 1100);
            }
        </script>

        <script>
            <?php include 'js/creator.js'; ?>
        </script>

	</body>

</html>