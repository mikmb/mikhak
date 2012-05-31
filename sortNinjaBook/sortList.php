<?php #sortList.php
error_reporting(E_ALL);
ini_set("display_errors", 1);

$page_title = 'Your Library!';
include('yourLibraryHeader.php');
function replaceWhiteSpaceWithNBSP($string) {
    echo str_replace(' ', '&nbsp;', $string);
}
?>

<div class="content">
<?php


//get the content and decode 
$string = file_get_contents("ninjaBookTitle.json");
$json_a = json_decode($string, true);

$origArray = array();
$sortedArray = array();

$origArray=$json_a;


$k=0;
foreach ($origArray as $key=>$value){
    if(is_array($value)){
        foreach ($value as $key=> $value){
          $sortedArray[$k]=$value;
          $k++;
        }
    }
}

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