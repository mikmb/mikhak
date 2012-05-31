<?php #step3.php
error_reporting(E_ALL);
ini_set("display_errors", 1);
?>
<!DOCTYPE html>
<html>
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
        <title></title>
        <link href="style.css" rel="stylesheet" type="text/css" />
<!--        <script type="text/javascript" src="jquery.js"></script>
        <script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.6.2/jquery.min.js">
        </script>
        <script type="text/javascript"> 
            $(document).ready(function(){
                $(".flip").click(function(){
                    $(".panel").slideDown("normal");
                });
            });
        </script>-->
    </head>
    <body>
        <div id="main">
            <h1>Zombie Survival Tutorial</h1>
            <p id="tutText">Step 5</p>
            <div id="sec1">
                <h3>5. Go to real world and show off your skills!</h3>
                <p style="text-align: center;">
                    <img src="img/zombieFight.jpg" height="350px" width="250px">

                    </img>
                </p>
                <p class="textInDiv">Now it is time to go to the real battle.</p>
                <p class="textInDiv">Step out and go for it.</p>
                <p class="textInDiv">Always remember that you are a zombie, and can be unbeatable, so be confident and you'll be good</p>
                <br/>
                <p class="textInDiv2">Good Luck!</p>
                <br/>
<!--                <div class="panel">
                    <p>Yey! You've finished step 1, click below again and scroll down a little and go to step 2!</p>
                    <a href="step3.php" color="Blue">Step 3.</a>
                </div>
                <p class="flip" >
                    Ready for step3? Click here.
                </p>-->

            </div>
            <br/>
            <br/>
            <br/>
<!--            <a href="step3.php"><p>Step 2!</p></a>-->
            <a href="step4.php" class="a2">back to step 4</a>
            <br/>
        </div>


    </body>
</html>
