<?php

    $packName = 'test';
    $description1 = 'Line 1';
    $description2 = 'Line 2';

    $path = sys_get_temp_dir()."/".$packName;

    mkdir($path);

    copy(getcwd()."\pack.mcmeta", $path."/pack.mcmeta");

    mkdir($path."/assets");
    copy(getcwd()."\block.png", $path."/pack.png");

    mkdir($path."/assets/minecraft");

    mkdir($path."/assets/minecraft/models");
    mkdir($path."/assets/minecraft/optifine");
    mkdir($path."/assets/minecraft/textures");

    mkdir($path."/assets/minecraft/textures/customs");
    mkdir($path."/assets/minecraft/models/item");

    mkdir($path."/assets/minecraft/optifine/random");
    mkdir($path."/assets/minecraft/optifine/random/entity");

    /*foreach ($items as $item) {
        mkdir($path."/".$packName."/assets/minecraft/models/item/".$item);
        $packMeta = fopen($path."/".$packName.'/pack.mcmeta', 'w') or die('Unable to create resourcepack!');
        $txt = "{\n   'pack':{\n      'pack_format':9,\n      'description':'§6JeremySMP custom textures §bJeremySMP'\n   }\n}";
        fwrite($packMeta, $txt);
        fclose($packMeta);
    }*/

    //Zip folder
    $zip = new ZipArchive();
    $zip->open($packName.'.zip', ZipArchive::CREATE | ZipArchive::OVERWRITE);
    $files = new RecursiveIteratorIterator(new RecursiveDirectoryIterator($path), RecursiveIteratorIterator::LEAVES_ONLY);
    foreach ($files as $name => $file) {
        if (!$file->isDir()) {
            $filePath = $file->getRealPath();
            $relativePath = substr($filePath, strlen($path) + 1);
            $zip->addFile($filePath, $relativePath);
        }
    }
    $zip->close();

    echo '<a href="`file:///'.$path.'/'.$packName.'.zip" download>Click me</a>';

    //deleteDir($path);

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