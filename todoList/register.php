<?php #Script register.php
error_reporting(E_ALL);
ini_set("display_errors", 1);

//This script performs an INSERT query to add a record to the users table.

$page_title = 'Register';
include('header.php');

//Check for form submission:
if($_SERVER['REQUEST_METHOD'] == 'POST'){

	require('mysqli_connect.php'); //Connect to db.


	$errors = array();	//initialize and error array
	
	//Check for a first name:
	if(empty($_POST['first_name'])){
		$errors[] = 'You forgot to enter your first name.';
	}else{
		$fn = mysqli_real_escape_string($dbc, trim($_POST['first_name']));
	}
	
	//Check for a lastname:
	if(empty($_POST['last_name'])){
		$errors[] = 'You forgot to enter your last name.';
	}else{
		$ln = mysqli_real_escape_string($dbc, trim($_POST['last_name']));
	}
	
	//Checkf for email address:
	if(empty($_POST['email'])){
		$errors[] = 'You forgot to enter your email address.';
	}else{
		$e = mysqli_real_escape_string($dbc, trim($_POST['email']));
	}
	
	//Check for the password and a match against the confirmed password:
	if(!empty($_POST['pass1'])){
		if($_POST['pass1'] != $_POST['pass2']){
			$errors[] = 'Your password did not match the confirmed password.';
		}else{
			$p = mysqli_real_escape_string($dbc, trim($_POST['pass1']));
		}
	}else{
		$errors[] = 'You forgot to enter your password.';
	}
	
	if(empty($errors)){//If everything's OK'
		//Register the user in database...
		
/*
 *Check the database to see if there exists a user with the same e-mail address,
 * and if yes it won't let the user to register, if not, it can insert the data 
 * in the database to register the user 
*/
        //}
            ///
            $q="SELECT user_id FROM users WHERE email='$e'";    //Make the query
            $r=@mysqli_query($dbc, $q);    //Run the query
            //Count the number of returned rows
            $num=mysqli_num_rows($r);
            if($num>0){
                echo '<p class="error"> The e-mail address you entered is already in the system.</p>';
              
            }
            ///
            else{
            
		//Make the query:
		$q = "INSERT INTO users(first_name, last_name, email, pass, registration_date)
			   VALUES('$fn', '$ln', '$e', SHA1('$p'), NOW())";
			   
		$r = @mysqli_query($dbc, $q); //Run the query.
		if($r){//If it ran OK.
			//Print a messege:
			echo '<h1>Thank You!</h1>
				  <p>You are now registered.</p>';
		}else{//If it did not run OK.
			//Public messege:
			echo '<h1>System Error</h1>
				  <p class="error">You could not be registered due to a system error. We appologize for any inconvenience.</p>';
				  
			//Debugging messege:
			echo '<p>' . mysqli_error($dbc) . '<br /><br />Query: ' . $q . '</p>';
	}//End of if($r)
	
	mysqli_close($dbc); //close the database connection.
	
	//Include the footer and quit the script:
	include('footer.html');
	exit();
            }
	}else{//Report the errors.
		echo '<h1>Error!</h1>
			  <p class="error">The following error(s) occured:<br />';
			  foreach ($errors as $msg){//Print each error.
			  	echo "* $msg<br />\n";
			  	
			  }
			  echo '</p><p>Please try again.</p><p><br /></p>';
	}//End of if(empty($errors)
	mysqli_close($dbc); //close the database connection.
	
}//End of the main submit conditional.
?>
<br />

<form action="register.php" method="post">
<fieldset>
	<legend>Register</legend>
        <div class="inputRow"><label>First Name: </label><input class="inputBox" type="text" name="first_name" maxlength="20" value="<?php if(isset($_POST['first_name'])) echo $_POST['first_name']; ?>"/></div>
        <div class="inputRow"><label>Last Name: </label><input class="inputBox" type="text" name="last_name" maxlength="40" value="<?php if(isset($_POST['last_name'])) echo $_POST['last_name']; ?>"/></div>
	<div class="inputRow"><label>Email Address: </label><input class="inputBox" type="text" name="email" maxlength="60" value="<?php if(isset($_POST['email'])) echo $_POST['email']; ?>"/></div>
	<div class="inputRow"><label>Password: </label><input class="inputBox" type="password" name="pass1" maxlength="20" value="<?php if(isset($_POST['pass1'])) echo $_POST['pass1']; ?>"/></div>
	<div class="inputRow"><label>Confirm Password: </label><input class="inputBox" type="password" name="pass2" maxlength="20" value="<?php if(isset($_POST['pass2'])) echo $_POST['pass2']; ?>"/></p>
	<p><input id="border" type="submit" name="submit" value="Register"/></p>
</fieldset>
</form>
<?php include('footer.html'); ?>