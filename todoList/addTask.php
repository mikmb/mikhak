<?php
#addTask.php
if (!isset($_SESSION)) {
    session_start();
}

error_reporting(E_ALL);
ini_set("display_errors", 1);

$page_title = 'Build Your To Do List!';
include('userHeader.php');
?>

<script type="text/javascript"> 
///////////////////////////   
    
    $(document).ready(function(){
       
        $('#submitButton').click(function(){ 
            newTask=$('#taskDesc').val();

            taskDateChosen=$('#day').val();
            $.ajax({
                type: "POST",
                url: "addNewTask.php",
                data: "newTaskDesc=" + newTask + "&newTaskDate=" +taskDateChosen

            }).done(function( msg ) {

                alert(msg);
                $('#taskDesc').val("");
                updateSelect();
                
            });
            
        });

    });
    
    
   </script>

    <label>Task Description: </label><input  id="taskDesc" type="text" name="tastDescription" /><br /><br/><br/>
    <label>Due Date: </label>
    <select name="daySelection" id="day">
        <option value="" selected="selected">Select a day</option>        
        <option>Mon</option>
        <option>Tue</option>
        <option>Wed</option>
        <option>Thu</option>
        <option>Fri</option>
        <option>Sat</option>
        <option>Sun</option>
    </select>

    <p><input id="submitButton" type="button" name="submit" value="Add Task"/></p>


<?php
include('footer.html');
?>