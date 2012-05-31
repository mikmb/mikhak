<?php #index.php
error_reporting(E_ALL);
ini_set("display_errors", 1);
?>
<!DOCTYPE html>
<html>
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
        <title></title>
        <link href="style.css" rel="stylesheet" type="text/css" />
        <script type="text/javascript" src="jquery.js"></script>
        <script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.6.2/jquery.min.js">
        </script>
        <script type="text/javascript"> 
            $(document).ready(function(){
                $(".flip").click(function(){
                    $(".panel").slideToggle("normal");
                });
            });
        </script>
    </head>
    <body>
        <div id="main">
            <h1>Zombie Survival Tutorial</h1>
            <p id="tutText">In order to win the battle, a zombie must follow these 5 steps everyday.</p>
            <div id="sec1">
                <h3>1. Stay in Shape!</h3>
                <p style="text-align: center;">
                    <img src="img/zombieExercise.jpg" height="350px" width="250px">

                    </img>
                </p>
                <ol id="olStyle">Follow these routines every morning to be ready for the rest of the day:
                    <li>Jog for 10 minutes to warm up.</li>
                    <li>Do 10 push-ups.</li>
                    <li>Do 10 pull-ups.</li>
                    <li>Stand up and stretch.</li>
                </ol>
                <br/>
                
                <div class="panel">
                    <p>Yey! You've finished step 1, click below again and scroll down a little and go to step 2!</p>
                </div>
                <p class="flip" >
                    <!--            <a href="step2.php">-->
                    When you're done, click here!
                    <!--            </a> -->
                </p>

            </div>
            <br/>
            <br/>
            <br/>
            <a href="step2.php" class="a2"><p>Step 2!</p></a>

            <br/>
        </div>


    </body>
</html>
