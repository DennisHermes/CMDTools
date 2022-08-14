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

            <div id="entity" class="card" onclick="openCreator('entity');">
                <img style="width: 3.5vw" src="media/entity.png" alt="" />
                <div class="card-info">
                    <h2>Add an entity</h2>
                </div>
                <h3 class="arrow">></h3>
            </div>

			<div id="block" class="card" onclick="openCreator('block');">
                <img src="media/block.png" alt="" />
                <div class="card-info">
                    <h2>Add a block</h2>
                </div>
                <h3 class="arrow">></h3>
            </div>

            <br><br>

            <div id="tools" class="card" onclick="openCreator('tools');">
                <img src="media/tools.png" alt="" />
                <div class="card-info">
                    <h2>Save & preview</h2>
                </div>
                <h3 class="arrow">></h3>
            </div>

            <br>
        </div>

        <div id="itemDiv" class="divs">
            <br>
            <h2>Select a base item</h2>
            <br>
            <div class="tooltip"><span class="iconify" data-icon="akar-icons:info"></span>
                <span class="tooltiptext">Select the item you want as a base. This is important if you want to recreate other items, such as a new type of food, then select: beef, chicken or maybe golden apple. Or use rabbit foot if you want it to have no crafting recipe.</span>
            </div>
            <br>
            <input list="itemList" id="itemID" autocomplete="off" onchange="itemCheck();" required>
            <datalist id="itemList">
                <?php 
                    $contents = file("lists/1.18/items.txt");
                    $items = array();
                    foreach($contents as $line) {
                        array_push($items, $line);
                    }
                    sort($items);
                    foreach($items as $item) {
                        echo("<option value='".$item."'>");
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
            <input id="itemCMD" type="number" autocomplete="off" onchange="itemCheck();" required>
            <br><br>
            <h2>Upload your texture</h2>
            <br>
            <div class="tooltip"><span class="iconify" data-icon="akar-icons:info"></span>
                <span class="tooltiptext">Upload the texture that you want. Minecraft uses .png files as textures. By default Minecraft uses textures of 16 by 16 pixels.</span>
            </div>
            <br>
            <label name="itemTexture" for="itemTexture" class="upload"><i class="fa fa-cloud-upload"></i> Select texture</label>
            <br><br>
            <p style="text-align: center; color: black; font-size: 15px;">(has to be .png file)</p>
            <p id="itemNameUpload" style="text-align: center; color: black; font-size: 12px;">No file selected</p>
            <br>
            <input onchange="document.getElementById('itemNameUpload').innerHTML = document.getElementById('itemTexture').files.item(0).name; itemCheck();" id="itemTexture" type="file" accept=".png" required/>
            <br>
            <button onclick="back('item');">🠔 Back</button>
            <button id="addItemButton" onclick="addItem();" disabled>Add item ➕</button>
        </div>

        <div id="entityDiv" class="divs">
            <br>
            <h2>Select a base entity</h2>
            <br>
            <div class="tooltip"><span class="iconify" data-icon="akar-icons:info"></span>
                <span class="tooltiptext">Choose a base entity. The entity model you choose is the model to which your texture will be linked. Your new entity will also take </span>
            </div>
            <br>
            <input list="entityList" id="entityID" autocomplete="off" onchange="entityCheck();" required>
            <datalist id="entityList">
                <?php 
                    $contents = file("lists/1.18/entities.txt");
                    $entities = array();
                    foreach($contents as $line) {
                        array_push($entities, $line);
                    }
                    sort($entities);
                    foreach($entities as $entity) {
                        echo("<option value='".$entity."'>");
                    }
                ?>
            </datalist>
            <br><br>
            <h2>Enter entity name</h2>
            <br>
            <div class="tooltip"><span class="iconify" data-icon="akar-icons:info"></span>
                <span class="tooltiptext">When you rename the given entity to this name, it will adopt the custom texture.</span>
            </div>
            <br>
            <input id="entityName" type="text" autocomplete="off" onchange="entityCheck();" required>
            <br><br>
            <h2>Upload your texture</h2>
            <br>
            <div class="tooltip"><span class="iconify" data-icon="akar-icons:info"></span>
                <span class="tooltiptext">Upload the texture that you want. Minecraft uses .png files as textures.</span>
            </div>
            <br>
            <label name="entityTexture" for="entityTexture" class="upload"><i class="fa fa-cloud-upload"></i> Select texture</label>
            <br><br>
            <p style="text-align: center; color: black; font-size: 15px;">(has to be .png file)</p>
            <p id="entityNameUpload" style="text-align: center; color: black; font-size: 12px;">No file selected</p>
            <br>
            <input onchange="document.getElementById('entityNameUpload').innerHTML = document.getElementById('entityTexture').files.item(0).name; entityCheck();" id="entityTexture" type="file" accept=".png" required/>
            <br>
            <button onclick="back('entity');">🠔 Back</button>
            <button id="addEntityButton" onclick="addEntity();" disabled>Add entity ➕</button>
        </div>

        <div id="blockDiv" class="divs">
            <br>
            <h2>Select a base block</h2>
            <br>
            <div class="tooltip"><span class="iconify" data-icon="akar-icons:info"></span>
                <span class="tooltiptext">Your new block behaves like the block you select here. Think about which tools should be used to break the blocks.</span>
            </div>
            <input list="entityList" id="entityID" autocomplete="off" onchange="entityCheck();" required>
            <datalist id="entityList">
                <?php 
                    $contents = file("lists/1.18/blocks.txt");
                    $entities = array();
                    foreach($contents as $line) {
                        array_push($entities, $line);
                    }
                    sort($entities);
                    foreach($entities as $entity) {
                        echo("<option value='".$entity."'>");
                    }
                ?>
            </datalist>
            <br><br>
            <h2>Enter block name</h2>
            <br>
            <div class="tooltip"><span class="iconify" data-icon="akar-icons:info"></span>
                <span class="tooltiptext"></span>
            </div>
            <br>
            <input id="entityName" type="text" autocomplete="off" onchange="entityCheck();" required>
            <br><br>
            <h2>Upload your texture</h2>
            <br>
            <div class="tooltip"><span class="iconify" data-icon="akar-icons:info"></span>
                <span class="tooltiptext">Upload the texture that you want. Minecraft uses .png files as textures.</span>
            </div>
            <br>
            <label name="entityTexture" for="entityTexture" class="upload"><i class="fa fa-cloud-upload"></i> Select texture</label>
            <br><br>
            <p style="text-align: center; color: black; font-size: 15px;">(has to be .png file)</p>
            <p id="entityNameUpload" style="text-align: center; color: black; font-size: 12px;">No file selected</p>
            <br>
            <input onchange="document.getElementById('entityNameUpload').innerHTML = document.getElementById('entityTexture').files.item(0).name; entityCheck();" id="entityTexture" type="file" accept=".png" required/>
            <br>
            <button onclick="back('entity');">🠔 Back</button>
            <button id="addEntityButton" onclick="addEntity();" disabled>Add entity ➕</button>
        </div>

        <div id="toolsDiv" class="divs">
            <br>
            <h2>Implemented textures</h2>
            <br>
            <button style="width: 95%;" onclick="console.log(sessionStorage.getItem('Items'));">Custom items 🠖</button>
            <br><br>
            <button style="width: 95%;" onclick="console.log(sessionStorage.getItem('Entities'));">Custom entities 🠖</button>
            <br><br>
            <button style="width: 95%;">Custom blocks 🠖</button>
            <br><br>
            <h2>Export texturepack</h2>
            <br>
            <button style="width: 95%;">Export as resourcepack</button>
            <br><br>
            <button class="disabled-button" title="Coming Soon!" style="width: 95%;">Instant upload to your server</button>
            <br><br><br>
            <button onclick="back('tools');">🠔 Back</button>
        </div>

        <script>
            let allowedItems = [
                <?php 
                    foreach($items as $item) {
                        echo ("'".trim(preg_replace('/\s\s+/', ' ', $item))."', ");
                    }
                ?>
            ]
            let allowedEntities = [
                <?php 
                    foreach($entities as $entity) {
                        echo ("'".trim(preg_replace('/\s\s+/', ' ', $entity))."', ");
                    }
                ?>
            ]
            
            function itemCheck() {
                var valid = document.getElementById('itemID').value.length !== 0 &&
                allowedItems.includes(document.getElementById('itemID').value) &&
                document.getElementById('itemCMD').value !== "" &&
                document.getElementById('itemTexture').value !== ""

                document.getElementById('addItemButton').disabled = !valid;
            }

            function entityCheck() {
                var valid = document.getElementById('entityID').value.length !== 0 &&
                allowedEntities.includes(document.getElementById('entityID').value) &&
                document.getElementById('entityName').value !== "" &&
                document.getElementById('entityTexture').value !== ""

                document.getElementById('addEntityButton').disabled = !valid;
            }
            
            function addItem() {
                var uuid = randomString(5);
                if (sessionStorage.getItem('Items') != null) {
                    var items = sessionStorage.getItem('Items') + uuid + ",";
                } else {
                    var items = uuid + ",";
                }

                sessionStorage.setItem(uuid + ".ITEM", document.getElementById('itemID').value);
                sessionStorage.setItem(uuid + ".CMD", document.getElementById('itemCMD').value);
                sessionStorage.setItem(uuid + ".TEXTURE", document.getElementById('itemTexture').value);
                sessionStorage.setItem("Items", items);
                
                console.log(sessionStorage.getItem('Items'));
                console.log(sessionStorage.getItem(uuid + ".ITEM"));
                console.log(sessionStorage.getItem(uuid + ".TEXTURE"));
                console.log(sessionStorage.getItem(uuid + ".CMD"));
            }

            function addEntity() {
                var uuid = randomString(5);
                if (sessionStorage.getItem('Entities') != null) {
                    var items = sessionStorage.getItem('Entities') + uuid + ",";
                } else {
                    var items = uuid + ",";
                }

                sessionStorage.setItem(uuid + ".ENTITY", document.getElementById('entityID').value);
                sessionStorage.setItem(uuid + ".CMD", document.getElementById('entityCMD').value);
                sessionStorage.setItem(uuid + ".TEXTURE", document.getElementById('entityTexture').value);
                sessionStorage.setItem("Entities", items);
                
                console.log(sessionStorage.getItem('Items'));
                console.log(sessionStorage.getItem(uuid + ".ITEM"));
                console.log(sessionStorage.getItem(uuid + ".TEXTURE"));
                console.log(sessionStorage.getItem(uuid + ".CMD"));
            }
        </script>

        <script>

            var tabOpen = false;

            function openCreator(tab) {
                if (!tabOpen) {
                    tabOpen = true;
                    document.getElementById("title").style.transform = "translateX(-100vw)";
                    if (tab != 'item') document.getElementById("item").style.transform = "translateX(-100vw)";
                    if (tab != 'entity') document.getElementById("entity").style.transform = "translateX(-100vw)";
                    if (tab != 'block') document.getElementById("block").style.transform = "translateX(-100vw)";
                    if (tab != 'tools') document.getElementById("tools").style.transform = "translateX(-100vw)";
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
            }

            function back(tab) {
                tabOpen = false;
                document.getElementById(tab + "Div").style.display = "none";
                setTimeout(() => {
                    document.getElementById(tab).style.transform = "translateY(0)";

                    document.getElementById("box2").style.height = "1px";

                    const arrows = document.querySelectorAll('.arrow');
                    arrows.forEach((arrow, index) => {
                        arrow.style.opacity = "1";
                    });
                }, 500);
                setTimeout(() => {
                    document.getElementById("title").style.transform = "translateX(0)";
                    if (tab != 'item') document.getElementById("item").style.transform = "translateX(0)";
                    if (tab != 'entity') document.getElementById("entity").style.transform = "translateX(0)";
                    if (tab != 'block') document.getElementById("block").style.transform = "translateX(0)";
                    if (tab != 'tools') document.getElementById("tools").style.transform = "translateX(0)";
                }, 1100);
            }

            function randomString(length) {
                chars = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
                var result = '';
                for (var i = length; i > 0; --i) result += chars[Math.floor(Math.random() * chars.length)];
                return result;
            }
        </script>

        <script>
            <?php include 'js/creator.js'; ?>
        </script>

	</body>

</html>