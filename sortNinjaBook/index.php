<?php #index.php
error_reporting(E_ALL);
ini_set("display_errors", 1);

$page_title = 'Welcome to Ninja Book Library!';
include('header.php');
?>
<div class="content">

    <p id="note">You can upload your .json format of input file 
        that contains title as the key and the title of the book as its values.  Then
    submit your file so you can have your list of Ninja books sorted in your own library.  You can
    see how my library looks like by clicking <?php echo " " ?><a href="myLibrary.php" class="a1">here</a>.
   </p>
<!--  Form to upload .json file  -->
    <form action="upload_file.php" method="post"
          enctype="multipart/form-data">
        <label for="file">Filename:</label>
        <input type="file" name="file" id="file" /> 
        <br />
        <input type="submit" name="submit" value="Submit" />
    </form>
</div>


<?php
include('footer.html');
?>