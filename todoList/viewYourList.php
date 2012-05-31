<?php
if (!isset($_SESSION)) {
    session_start();
}

error_reporting(E_ALL);
ini_set("display_errors", 1);

$page_title = 'Build Your To Do List!';
include('userHeader.php');
?>

<?php
    require 'mysqli_connect.php';    //Connect to database

    $uId = $_SESSION['userId'];
//    echo $uId;
    
    $output = '<table border="1px solid ">
                    <tr>
                        <th>Task Description</th>
                        <th>Due Date</th>
                    </tr>';
        echo $output;
    //run the query and show from 
    $query ="SELECT * FROM task WHERE user_id='$uId'";
    
    $result=mysqli_query($dbc, $query);
    $num=mysqli_num_rows($result);
    $i=0;
    while (    $row = mysqli_fetch_array($result)) {
    echo '<tr>';
    echo '<td>' . $row['task_description'] . '</td>';
    echo '<td>' . $row['due_date'] . '</td>';
    echo '</tr>';    
    }
	$output = '</table>';
        echo $output;
mysqli_close($dbc);    
?>
<?php
include('footer.html');
?>    