<?php #header.php
if (!isset($_SESSION)) {
    session_start();
}
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
    <head>
        <title><?php echo $page_title; ?></title>

        <link rel="stylesheet" href="style.css" type="text/css" media="screen" />
        <meta http-equiv="content-type" content="text/html; charset=utf-8" />
        <script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jquery/1.7.1/jquery.min.js"></script>
    </head>
    <body>
        <div id="header"> 
            <h1>Build Your To Do List</h1>
        
        <?php //create login/logout link 
        if(isset ($_SESSION['email']) && $_SESSION['email']=='eaddr'){
            echo '<h5>Welcome '.$_SESSION['name'].'</h5>'; 
            echo '<a href="logout.php">'.'Logout!</a></p>';
        }else{
            echo '<a href="logIn.php">Login</a>';
            echo '<a href="register.php">Register</a>';
        }
        ?>
            
        </div>
	<div id="content"><!-- start of the page-specific content -->        
