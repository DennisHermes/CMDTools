<?php

    $file = $_FILES['file'];

    $dir = "thread";
    $threadPicker = rand(0, 3);
    if ($threadPicker == 1) {
        $dir = "thread1";
    } else if ($threadPicker == 2) {
        $dir = "thread2";
    } else {
        $dir = "thread3";
    }
    mkdir($dir, 0700);

    move_uploaded_file($file['tmp_name'], $dir."/".$file['name']);

    header("location: fileReader.php?dir=".$dir."&name=".$file['name']);

?>