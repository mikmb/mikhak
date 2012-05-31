<?php #logIn.php script
//it creates the log in page and it checks for errors

error_reporting(E_ALL);
ini_set("display_errors", 1);

$page_title='Log In';
include('header.php');

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

