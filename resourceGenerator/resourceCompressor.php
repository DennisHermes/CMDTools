<?php

    $packName = 'test';
    $description1 = 'Line 1';
    $description2 = 'Line 2';

    mkdir($_SERVER['DOCUMENT_ROOT']."/".$packName);
    copy(getcwd()."\pack.mcmeta", $_SERVER['DOCUMENT_ROOT']."/".$packName."/pack.mcmeta");

    mkdir($_SERVER['DOCUMENT_ROOT']."/".$packName."/assets");
    copy(getcwd()."\block.png", $_SERVER['DOCUMENT_ROOT']."/".$packName."/pack.png");

    mkdir($_SERVER['DOCUMENT_ROOT']."/".$packName."/assets/minecraft");

    mkdir($_SERVER['DOCUMENT_ROOT']."/".$packName."/assets/minecraft/models");
    mkdir($_SERVER['DOCUMENT_ROOT']."/".$packName."/assets/minecraft/optifine");
    mkdir($_SERVER['DOCUMENT_ROOT']."/".$packName."/assets/minecraft/textures");

    mkdir($_SERVER['DOCUMENT_ROOT']."/".$packName."/assets/minecraft/textures/customs");
    mkdir($_SERVER['DOCUMENT_ROOT']."/".$packName."/assets/minecraft/models/item");

    mkdir($_SERVER['DOCUMENT_ROOT']."/".$packName."/assets/minecraft/optifine/random");
    mkdir($_SERVER['DOCUMENT_ROOT']."/".$packName."/assets/minecraft/optifine/random/entity");

    foreach ($items as $item) {
        mkdir($_SERVER['DOCUMENT_ROOT']."/".$packName."/assets/minecraft/models/item/".$item);
        $packMeta = fopen($_SERVER['DOCUMENT_ROOT']."/".$packName.'/pack.mcmeta', 'w') or die('Unable to create resourcepack!');
        $txt = "{\n   'pack':{\n      'pack_format':9,\n      'description':'§6JeremySMP custom textures §bJeremySMP'\n   }\n}";
        fwrite($packMeta, $txt);
        fclose($packMeta);
    }
?>