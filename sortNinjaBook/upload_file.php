<?php #upload_file.php
error_reporting(E_ALL);
ini_set("display_errors", 1);

$page_title = "Ninja Book Library!";
?>
<?php

//check for error
if ($_FILES["file"] == "") {
    echo "Error: " . $_FILES["file"]["error"] . "Please upload a .json file<br />";
    require 'index.php';
}
if ($_FILES["file"]["error"] > 0 && $_FILES["file"] == "") {
    echo "Error: " . $_FILES["file"]["error"] . "Please upload a .json file<br />";
    require 'index.php';
} else {

    function findexts($filename) {
        $filename = strtolower($filename);
        $exts = end(explode('.', $filename));
        return $exts;
    }

//getting the file's extension and renaming the file
    $ext = findexts($_FILES['file']['name']);
    $target = "ninjaBookTitle" . "." . $ext;
//move the file to the desired directory
    move_uploaded_file($_FILES["file"]["tmp_name"], dirname(__FILE__) . "/" . $target);


    require 'sortList.php';
}
?>
