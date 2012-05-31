<?php   #script edTask.php
//This script shows teh existing categories name in a selection option

error_reporting(E_ALL);
ini_set("display_errors", 1);

require 'mysqli_connect.php';   //Connect to database

if(empty ($_POST['edTaskName'])){
    echo 'Please select a task you wish to edit.';
}
if(empty ($_POST['editTaskDesc'])){
    echo 'Please write a new description so you can edit the previous one.';
}
if(empty ($_POST['newTaskDate'])){
    echo 'Please choose a day for your task.';
}else{

$oldDesc=mysqli_real_escape_string($dbc, trim($_POST['edTaskName']));
$newDesc=mysqli_real_escape_string($dbc, trim($_POST['editTaskDesc']));
$newDate=mysqli_real_escape_string($dbc, trim($_POST['newTaskDate']));

$q="UPDATE task SET task_description='$newDesc' , due_date='$newDate' WHERE task_id='$oldDesc'";
$r=mysqli_query($dbc, $q);
if($r){
    echo "Successfully Edited.";
}else{
    echo 'System Error! You were not able to edit any task due to system error! We appologize for any inconvenience!';
}
}
mysqli_close($dbc);
?>
