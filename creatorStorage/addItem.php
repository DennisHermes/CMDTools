<?php

    session_start();

    $id = $_POST["ID"];
    $cmd = $_POST["CMD"];
    $texture = $_POST["Texture"];

    $item = array(
        "ID" => $id,
        "CMD" => $cmd,
        "Texture" => $texture,
    );

    if (isset($_SESSION["Items"])) {
        $array = $_SESSION["Items"];
        array_push($array, $item);
    } else {
        $array = array(
            $item
        );
    }
    
    $_SESSION["Items"] = $array;

?>