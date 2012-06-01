<?php   #script showExTask.php
//it provides the selection option for the existing tasks
error_reporting(E_ALL);
ini_set("display_errors", 1);


require 'mysqli_connect.php';   //Connect to database

$q="SELECT task_description, task_id FROM task ORDER BY task_id ASC";
$r=mysqli_query($dbc, $q); //Runs the query

while($row=mysqli_fetch_array($r)){
$task_desc=$row['task_description'];
$taskId=$row['task_id'];
    echo '<option value="'.$taskId.'">'.$task_desc.'</option>';

}
mysqli_close($dbc);
?>
