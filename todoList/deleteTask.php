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


    function updateSelectTaskForDel(){//Updates the existing tasks's option for the Delete Task
        $.ajax({
            type: "POST",
            url: "showExTask.php"

        })
        .done(function(msg){
            selectDefault='<option value="" selected="selected" >Choose a Task</option>'; 
            $('#taskOptionForDel').html(selectDefault+msg);
        });    
    }
    
    ///////////////////////////////
    $(document).ready(function(){
        updateSelectTaskForDel();


        $('#deleteButton').click(function(){ 
            delTask=$('#taskOptionForDel').val();
            $.ajax({
                type: "POST",
                url: "delTask.php",
                data: "delTaskName=" + delTask
            }).done(function( msg ) {
                alert(msg);
                $('#taskOptionForDel').val("");

                updateSelectCatForDel();

            });
        });
        updateSelectTaskForDel();        

    });    

</script>

<?php
?>
<form>


    <select name="taskToChoose" class="marginDelAdjust" id="taskOptionForDel">
        <option value="" selected="selected" >Choose a task</option> 
    </select>


    <p><input id="deleteButton" type="button" name="delete" value="Delete Task"/></p>

</form>

<?php
include('footer.html');
?>