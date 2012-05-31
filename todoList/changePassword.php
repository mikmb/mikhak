<?php # changePassword.php script 
//that allows the user to change password

error_reporting(E_ALL);
ini_set("display_errors", 1);

$page_title = 'Change Your Password';
include ('header.php');

//Check for the submission:
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    require 'mysqli_connect.php';//Connect to database
    
    $errors = array();    //Initialize and array
    //Check if an e-mail address was entered
    if (empty($_POST['email'])) {
        $errors[] = 'You forgot to enter your email address.';
    } else {
        $e = mysqli_real_escape_string($dbc, trim($_POST['email']));
    }

    //Check for the new password
    if (empty($_POST['pass'])) {
        $errors[] = 'You forgot to enter your current password';
    } else {
        $p = mysqli_real_escape_string($dbc, trim($_POST['pass']));
    }

    //CHeck for the new password and see if it matches to the confirmed password
    if (!empty($_POST['pass1'])) {
        if ($_POST['pass1'] != $_POST['pass2']) {
            $errors[] = 'Your new password did not match the confirmed password.';
        } else {
            $np = mysqli_real_escape_string($dbc, trim($_POST['pass1']));
        }
    } else {
        $errors[] = 'You forgot to enter your new password';
    }//End of checking the errors for the new password

    if (empty($errors)) {    //check if everything is ok
        //it should check if they have entered the right email and password combination
                
        $q = "SELECT user_id FROM users WHERE(email='$e' AND pass=SHA1('$p))";        
        
        $r = mysqli_query($dbc, $q);
                
        $num = mysqli_num_rows($r);
        
        if ($num == 1) {
            //Gets the user_id
            $row = mysqli_fetch_array($r, MYSQL_NUM);

            //Updating the query
            $q = "UPDATE users SET pass=SHA1('$np') WHERE user_id=$row[0]";
            $r = @mysqli_query($dbc, $q);

            if (mysqli_affected_rows($dbc) == 1) {//if it ran OK
                //Print a msg to thank the user
                echo '<h1>Thank you!<h1>
            <p class="error">Your password has been changed successfully</p>';
            } else {//if it didn't run ok
                echo '<h1>System Error</h1>
            <p class="error">We appologize for any inconvenience. Your password 
            could not be changed at this time due to system error</p>';
            }

            mysqli_close($dbc); //close the database connection
            include ('include/footer.html');
            exit();
        } else {//If the email address and the current password don't match
            echo '<h1>Error<h1>
                  <p class="error">The email and password do not match those on the system.</p>';
        }
    } else {//report all the errors
            echo '<h1>Error!</h1>';        
        echo '<p class="error">The following error(s) occured:<br />';
        foreach ($errors as $msg) {
            echo "* $msg<br />\n";
        }
        echo '</p><p> Please try again.</p>';
    }//End of if(empty($errors))
    mysqli_close($dbc); //close the database
}//End of the main Submit Conditional
?>

<br />

<form action="changePassword.php" method="post">
    <fieldset>
        <legend>Change Password</legend>
        <div class="inputRow"><label>Email Address: </label><input class="inputBox" type="text" name="email" maxlength="60" value="<?php if (isset($_POST['email']))
    echo $_POST['email']; ?>"/></div>
        <div class="inputRow"><label>Current Password: </label><input class="inputBox" type="password" name="pass" maxlength="20" value="<?php if (isset($_POST['pass']))
    echo $_POST['pass']; ?>"/></div>
        <div class="inputRow"><label>New Password: </label><input class="inputBox" type="password" name="pass1" maxlength="20" value="<?php if (isset($_POST['pass1']))
    echo $_POST['pass1']; ?>"/></div>
        <div class="inputRow"><label>Confirm New Password: </label><input class="inputBox" type="password" name="pass2" maxlength="20" value="<?php if (isset($_POST['pass2']))
    echo $_POST['pass2']; ?>"/></p>
            <p><input id="border" type="submit" name="submit" value="Change Password"/></p>
    </fieldset>
</form>
<?php include('footer.html'); ?>
