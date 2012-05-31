<?php
#index.php
if (!isset($_SESSION)) {
    session_start();
}

error_reporting(E_ALL);
ini_set("display_errors", 1);

$page_title = 'Build Your To Do List!';
include('userHeader.php');
?>

<script type="text/javascript"> 

    function updateSelectTaskForEdit(){//Updates the existing tasks's option for the Edit Task
        $.ajax({
            type: "POST",
            url: "showExTask.php"

        })
        .done(function(msg){
            selectDefault='<option value="" selected="selected" >Choose a Task</option>'; 
            $('#taskOptionForEdit').html(selectDefault+msg);
        });    
    }
    
    ///////////////////////////////
    $(document).ready(function(){
        updateSelectTaskForEdit();

        $('#editButton').click(function(){ 
            edTask=$('#taskOptionForEdit').val();
            edDescTask=$('#taskDescEdit').val();
            taskDate=$('#day').val();
            $.ajax({
                type: "POST",
                url: "edTask.php",
                data: "edTaskName=" + edTask + "&editTaskDesc=" + edDescTask + "&newTaskDate=" + taskDate
            }).done(function( msg ) {
                alert(msg);
                $('#taskOptionForEdit').val("");

                updateSelectCatForEdit();

            });
        });
        updateSelectTaskForEdit();        

    });    

</script>

<?php

?>


            <select name="taskToChoose"  id="taskOptionForEdit">
                <option value="" selected="selected" >Choose a task</option> 
            </select>


<br/><br/>
    <label>Edit Task Description: </label><input  id="taskDescEdit" type="text" name="taskDescription" /><br /><br/><br/>
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
    <p><input id="editButton" type="button"  name="edit" value="Edit Task"/></p>


<?php
include('footer.html');
?>