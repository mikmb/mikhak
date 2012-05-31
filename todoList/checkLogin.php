<?php   #script checkLogin.php 
//   session_start();
if(!isset ($_SESSION)){
    session_start();
}    
error_reporting(E_ALL);
ini_set("display_errors", 1);



$page_title='Log in';

if($_SERVER['REQUEST_METHOD']=='POST'){
    require 'mysqli_connect.php';    //Connect to database
    
    $errors = array();    //Initialize and array
    //Check if an e-mail address was entered
    if (empty($_POST['email'])) {
        $errors[] = 'You forgot to enter your email address.';
    } else {
        $e = mysqli_real_escape_string($dbc, trim($_POST['email']));       
    }

    //Check for the password
    if (empty($_POST['pass'])) {
        $errors[] = 'You forgot to enter your password';
    } else {
        $p = mysqli_real_escape_string($dbc, trim($_POST['pass']));
    }
    

    //if there were no errors
    if(empty ($errors)){
        
        
/////////////////////////////////////     
/////////CHECK IF THE USER LOGGED IN
//
        $q="SELECT user_id, first_name FROM users WHERE email='$e' AND pass='$p'";
        $r=mysqli_query($dbc, $q);
        $num=mysqli_num_rows($r);

        if($num == 1){
            
            
            $expire=time()+3600;    //expire after one hour
            setcookie("email", $e, $expire); 
            $_SESSION['email']='emailAddr';
            
            $sql="SELECT first_name FROM users WHERE email='$e' AND pass='$p'";
            $result=mysqli_query($dbc, $sql);
            $row=mysqli_fetch_array($result);
                $_SESSION['name']=$row['first_name'];
                $_SESSION['userType'] = 'USER';
            header("Location: userIndex.php");
        }else if($num > 1){//it didn't find a match
            $errors[]='The email and password combination don\'t match those on system';

            include ('header.php');
            echo '<h1>Error!</h1>
            <p class="error">The following error(s) occured:<br />';        
            foreach ($errors as $msg){
            echo "* $msg <br />";
            }
    
            echo '<p>Please try again</p>';
        
        } else if($num==0){
        
//        
//END OF CHECK IF USER LOGGED IN        
/////////////////////////////////////        
        
        //obtain the user_id and first_name for that email/password combination
        $q="SELECT user_id, first_name FROM users WHERE email='$e' AND pass=SHA1('$p')";
        
        $r=mysqli_query($dbc, $q);  //Runs the query
//        var_dump($r);
//       echo mysqli_error($dbc);
        $num=mysqli_num_rows($r);
        //check the result 
        if($num == 1){
            
            
            $expire=time()+3600;    //expire after one hour
            setcookie("email", $e, $expire); 
            $_SESSION['email']='eaddr';
            
            $sql="SELECT user_id, first_name FROM users WHERE email='$e' AND pass=SHA1('$p')";
            $result=mysqli_query($dbc, $sql);
            $row=mysqli_fetch_array($result);
                $_SESSION['userId']=$row['user_id'];
//            echo $_SESSION['userId'];
//                echo $row['user_id'];
                $_SESSION['name']=$row['first_name'];
//            echo $_SESSION['name'];
                
            $_SESSION['userType'] = 'USER';

            header("Location: addTask.php");
        }else{//it didn't find a match
            $errors[]='The email and password combination don\'t match those on system';
            include ('header.php');
            echo '<h1>Error!</h1>
            <p class="error">The following error(s) occured:<br />';        
            foreach ($errors as $msg){
            echo "* $msg <br />";
            }
    
            echo '<p>Please try again</p>';
        
        }            
        }//END OF if($num==0)
    }else{//if there was some errors when the user entered the log in info
//        //Prints the errors if any
        include('header.php');
	echo '<h1>Error!</h1>
            <p class="error">The following error(s) occured:<br />';        
            foreach ($errors as $msg){
            echo "* $msg <br />";
        }
    
        echo '<p>Please try again</p>';
        
        }
       
mysqli_close($dbc);    
}//End of main submission form
?>        

<!--Display the log in form-->
<br />

<form action="checkLogin.php" method="post">
<fieldset>
	<legend>Log In</legend>
	<div class="inputRow"><label>Email Address: </label><input class="inputBox" type="text" name="email" maxlength="60"/></div>
	<div class="inputRow"><label>Password: </label><input class="inputBox" type="password" name="pass" maxlength="20"/></div>
        <p><input id="border" type="submit" name="submit" value="Log In"/></p>
        <div id="logInStyle"><ul>
                <li><a href="changePassword.php">Change Your Password</a></li>
            </ul>
        </div>
</fieldset>
</form>
        <?php include('footer.html'); ?>
