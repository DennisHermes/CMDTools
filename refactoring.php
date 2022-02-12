<?php

    $file = $_FILES['file'];

    $dir = "folder";
    mkdir($dir, 0700);

    move_uploaded_file($file['tmp_name'], $dir."/".$file['name']);

    header("location: fileReader.php?dir=".$dir."&name=".$file['name']);

?>