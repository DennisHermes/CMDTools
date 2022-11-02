<?php

    session_start();

    $packName = $_POST["title"];
    $description1 = str_replace("&", "§", $_POST["line1"]);
    $description2 = str_replace("&", "§", $_POST["line2"]);

    //Create tmp dirs
    $path = getcwd()."/".$packName;
    mkdir($path);
    copy(getcwd()."\pack.mcmeta", $path."/pack.mcmeta");
    mkdir($path."/assets");
    copy(getcwd()."\beer.png", $path."/pack.png");
    mkdir($path."/assets/minecraft");
    mkdir($path."/assets/minecraft/models");
    mkdir($path."/assets/minecraft/optifine");
    mkdir($path."/assets/minecraft/textures");
    mkdir($path."/assets/minecraft/textures/block");
    mkdir($path."/assets/minecraft/textures/block/customs");
    copy(getcwd()."\beer.png", $path."/assets/minecraft/textures/block/customs/beer.png");
    mkdir($path."/assets/minecraft/models/item");
    mkdir($path."/assets/minecraft/optifine/random");
    mkdir($path."/assets/minecraft/optifine/random/entity");

    //Setup packmeta
    $itemFile = fopen($path."/pack.mcmeta", 'w');
    $txt = '{"pack":{"pack_format":9,"description":"'.$description1.'\n'.$description2.'"}}';
    fwrite($itemFile, str_replace("'", '"', $txt));
    fclose($itemFile);

    //add items
    $items = $_SESSION["Items"];
    foreach($items as $item) {
        $characters = '0123456789abcdefghijklmnopqrstuvwxyz';
        $uuid = '';
        for ($i = 0; $i < 5; $i++) {
            $uuid .= $characters[rand(0, strlen($characters) - 1)];
        }

        $item_id = str_replace(" ", "_", strtolower($item["ID"]));

        $itemFile = fopen($path."/assets/minecraft/models/item/".$item_id.".json", 'w');
        $txt = "{\n'parent': 'item/generated',\n'textures': {\n'layer0': 'item/".$item_id."'\n},\n'overrides': [\n{\n'predicate': {\n'custom_model_data': ".$item["CMD"]."\n},\n'model': 'item/".$item_id."/".$uuid."'\n}\n]\n}";
        fwrite($itemFile, str_replace("'", '"', $txt));
        fclose($itemFile);

        if (!is_dir($path."/assets/minecraft/models/item/".$item_id)) mkdir($path."/assets/minecraft/models/item/".$item_id);
        $textureFile = fopen($path."/assets/minecraft/models/item/".$item_id."/".$uuid.".json", 'w');
        $txt = "{\n'parent': 'minecraft:item/generated',\n'textures': {\n'layer0': 'minecraft:block/customs/beer'\n}\n}";
        fwrite($textureFile, str_replace("'", '"', $txt));
        fclose($textureFile);
    }

    //Zip folder
    $source = $path;
    $archive_file_name = getcwd()."/compressed.zip";
    $zip = new ZipArchive();
    $zip->open($archive_file_name, ZIPARCHIVE::CREATE);
    $source = str_replace('\\', '/', realpath($source));
    if (is_dir($source) === true) {
        $files = new RecursiveIteratorIterator(new RecursiveDirectoryIterator($source), RecursiveIteratorIterator::SELF_FIRST);
        foreach ($files as $file) {
            $file = str_replace('\\', '/', realpath($file));
            if (is_dir($file) === true) {
                $zip->addEmptyDir(str_replace($source . '/', '', $file . '/'));
            } else if (is_file($file) === true) {
                $zip->addFromString(str_replace($source . '/', '', $file), file_get_contents($file));
            }
        }
    } else if (is_file($source) === true) {
        $zip->addFromString(basename($source), file_get_contents($source));
    }
    $zip->close();
    ob_clean();
    ob_end_flush();

    //Send zip packet
    header("Content-type: application/zip"); 
    header("Content-Disposition: attachment; filename=".$packName.".zip");
    header("Content-length: ".filesize($archive_file_name));
    header("Pragma: no-cache"); 
    header("Expires: 0"); 
    readfile($archive_file_name);

    //Delete tmp files
    deleteDir($path);
    unlink($archive_file_name);

    function deleteDir($dirPath) {
        if (!is_dir($dirPath)) {
            throw new InvalidArgumentException("$dirPath must be a directory");
        }
        if (substr($dirPath, strlen($dirPath) - 1, 1) != '/') {
            $dirPath .= '/';
        }
        $files = glob($dirPath . '*', GLOB_MARK);
        foreach ($files as $file) {
            if (is_dir($file)) {
                deleteDir($file);
            } else {
                unlink($file);
            }
        }
        rmdir($dirPath);
    }
    
?>