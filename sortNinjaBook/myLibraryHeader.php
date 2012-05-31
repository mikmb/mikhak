<?php
#header.php
if (!isset($_SESSION)) {
    session_start();
}
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
    <head>
        <title><?php echo $page_title; ?></title>
        <script type="text/javascript">
            function show_alert()
            {
                alert("Please upload a .json file!");
            }
        </script>
        <link rel="stylesheet" href="style.css" type="text/css" media="screen" />
        <meta http-equiv="content-type" content="text/html; charset=utf-8" />
        <script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jquery/1.7.1/jquery.min.js"></script>
    </head>
    <body>
        <div id="header"> 
            <h1>My Ninja Book Library</h1>
<?php echo " " ?><a href="index.php" class="a1">Go back to Library</a>


        </div>
