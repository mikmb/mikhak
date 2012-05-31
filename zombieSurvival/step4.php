<?php #step4.php
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
            <p id="tutText">Step 4</p>
            <div id="sec1">
                <h3>4. Choose weapon and practice!</h3>
                <p style="text-align: center;">
                    <img src="img/zombieWeapon.jpg" height="350px" width="250px">

                    </img>
                </p>
                <p class="textInDiv">After step 3 you must be able to choose your real weapon that you are more comfortable with.</p>
                <p class="textInDiv">When you feel confident using a weapon then it's time to choose another weapon.</p>
                <p class="textInDiv">This way you get to use and get familiar with different kinds of weapons.</p>
                <br/>
                <p class="textInDiv2">The fun begins here, Click<?php echo " " ?><a href="step5.php" class="a3">Step 5</a></p>

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
            <a href="step3.php" class="a2">back to step 3</a>

            <br/>
        </div>


    </body>
</html>
