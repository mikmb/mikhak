<?php
session_start();


//session_unset('email');
error_reporting(E_ALL);
ini_set("display_errors", 1);


if(isset ($_SESSION['email']))
    unset ($_SESSION['email']);
if(isset ($_SESSION['cart']));
    unset ($_SESSION['cart']);
setcookie("email","", time()-3600);
header("Location: logIn.php");

?>
