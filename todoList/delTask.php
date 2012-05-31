<?php   #script delTask.php

error_reporting(E_ALL);
ini_set("display_errors", 1);

require 'mysqli_connect.php';   //Connect to database

if(empty ($_POST['delTaskName'])){
    echo 'Please select a task you wish to delete.';
}else{

$exTask=mysqli_real_escape_string($dbc, trim($_POST['delTaskName']));
$q="DELETE FROM task WHERE task_id='$exTask'";
$r=mysqli_query($dbc, $q);
if($r){
    echo 'Successfully Deleted.';
}else{
    echo 'System Error! You were not able to delete any task due to system error! We appologize for any inconvenience!';
}
}
mysqli_close($dbc);
?>
