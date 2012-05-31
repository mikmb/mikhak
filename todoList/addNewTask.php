<?php   #script addNewTask.php
//It adds the new task
//
if (!isset($_SESSION)) {
    session_start();
}
error_reporting(E_ALL);
ini_set("display_errors", 1);

    $uId = $_SESSION['userId'];
    
require 'mysqli_connect.php';   //Connect to database


if(empty ($_POST['newTaskDesc']) || empty ($_POST['newTaskDate'])){
    echo 'Please fill out the the form.' ;
}else{

$newTaskToDo=mysqli_real_escape_string($dbc, trim($_POST['newTaskDesc']));
$newTaskDatePicked=mysqli_real_escape_string($dbc, trim($_POST['newTaskDate']));

$q="INSERT INTO task(task_description, user_id, due_date)
    VALUES ('$newTaskToDo', '$uId', '$newTaskDatePicked')";
$r=mysqli_query($dbc, $q); //Runs the query
if($r){
    echo 'You have successfully added a new task.';
}  else {
    echo 'System Error! You were not able to add the new task due to system error! We appologize for any inconvenience!';
}
}

mysqli_close($dbc);

?>
