<?php #myLibrary.php
error_reporting(E_ALL);
ini_set("display_errors", 1);

$page_title = 'Welcome to My Library!';
include('myLibraryHeader.php');


?>


<div class="content">

    <?php
function replaceWhiteSpaceWithNBSP($string) {
    echo str_replace(' ', '&nbsp;', $string);
}    
    $origArray = array();
//get teh content and decode
    $string = file_get_contents("ninja1Json.json");
    $json_a = json_decode($string, true);
    $origArray = $json_a;

    $sortedArray = array();

    $k = 0;
//gets the vallue from the original arral and store it in sorted array
    foreach ($origArray as $key => $value) {
        if (is_array($value)) {
            foreach ($value as $key => $value) {
                $sortedArray[$k] = $value;
                $k++;
            }
        }
    }
//sort the array
    sort($sortedArray, SORT_STRING);
    $j = 1;
//get the number of elements in the sorted array
    $sortedArrayCount = count($sortedArray);
    foreach ($sortedArray as $value) {
        if ($j == 1) {
            echo " <div class='content2'>";
        }

        echo "<div class='rotate'>";
        replaceWhiteSpaceWithNBSP($value);
        echo "</div>";

        if ($j % 35 == 0 && $j != 1) {//make another div if the number of book titles shown are more than 34
            echo "</div>";
            if ($j != $sortedArrayCount)
                echo " <div class='content2'>";
        }
        $j++;
    }
    ?>
</div>

</div>


<?php
include('footer.html');
?>