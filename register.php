<!--
 * register.php - Registration page for new users
 *
 * This page displays a form for users to fill out to create a
 * new account. If there are no errors, the user input is sanitized
 * and stored in the database as a new account.
 *
 * Author: Kaleb Phillips
 * Date: December 2 2024
 * Class: UTSA CS-4413-002 Web Technologies
 -->

<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>Register</title>
	<link href="./assets/css/bootstrap.css" rel="stylesheet"/>
	<!-- Custom css -->
	<link href="./assets/css/styles.css" rel="stylesheet"/>
</head>
<body>
	<?php
		// HTML for page
		echo '<br>';
		echo '<div class="container">';
		echo '	<div class="panel panel-default">';
		echo '		<div class="panel-heading">';
		echo '			<h3 class="panel-title">Register</h3>';
		echo '		</div>';
		echo '		<div class="panel-body">';
		// Create a session for this client connection
		session_start();
		if (!isset($_POST['submit']))
		{
			echo '<h2>Please fill out the following form:</h2>';
			echo '<form method="post" action="">';
			// If there was an error with username
			if (isset($_GET['usernameErr']))
			{
				// Check for blank error
				if ($_GET['usernameErr']=="null") 
				{
					// Blank error case
					echo '	<div class ="form-group has-error">';
					echo '		<label class="control-label">Username:</label>';
					echo '		<input name="username" type="text" class="form-control">';
					echo '		<span class="help-block" id="unFeedback">Username cannot be blank!</span>';
					echo '	</div>';
				}
				// Check for already exists error
				if ($_GET['usernameErr']=="exists") 
				{
					// Already exists error case
					echo '	<div class ="form-group has-error">';
					echo '		<label class="control-label">Username:</label>';
					echo '		<input name="username" type="text" class="form-control" value="'.$_SESSION['username'].'">';
					echo '		<span class="help-block" id="unFeedback">Username already exists!</span>';
					echo '	</div>';
				}
			}
			else
			{
				// success state
				if (isset($_SESSION['username']))
				{
					echo '	<div class="form-group has-success">';
					echo '		<label class="control-label">Username:</label>';
					echo '		<input name="username" type="text" class="form-control" value="'.$_SESSION['username'].'">';
					echo '		<span class="help-block" id="unFeedback"></span>';
					echo '	</div>';
				}
				// defualt state
				else
				{
					echo '	<div class="form-group">';
					echo '		<label class="control-label">Username:</label>';
					echo '		<input name="username" type="text" class="form-control">';
					echo '		<span class="help-block" id="unFeedback"></span>';
					echo '	</div>';
				}
			}
			// If there was an error with password
			if (isset($_GET['passwordErr']))
			{
				// Check for blank error
				if ($_GET['passwordErr']=="null") 
				{
					// Blank error case
					echo '	<div class="form-group has-error">';
					echo '		<label class="control-label">Password:</label>';
					echo '		<input name="password" type="password" class="form-control">';
					echo '		<span class="help-block" id="pwFeedback">Password cannot be blank!</span>';
					echo '	</div>';
				}
			}
			else
			{
				// success state
				if (isset($_SESSION['password']))
				{
					echo '	<div class="form-group has-success">';
					echo '		<label class="control-label">Password:</label>';
					echo '		<input name="password" type="password" class="form-control"value="'.$_SESSION['password'].'">';
					echo '		<span class="help-block" id="pwFeedback"></span>';
					echo '	</div>';
				}
				// defualt state
				else
				{
					echo '	<div class="form-group">';
					echo '		<label class="control-label">Password:</label>';
					echo '		<input name="password" type="password" class="form-control">';
					echo '		<span class="help-block" id="pwFeedback"></span>';
					echo '	</div>';
				}
			}
			// Submit button
			echo '	<button class="btn btn-primary" type="submit" name="submit" value="submit">Submit</button>';
			echo '</form>';
		}
		else
		{
			$errors=array();
			include("functions.php");
			// Get the username and check for errors
			$username=$_POST['username'];
			// Check if username already exists
			$dblink=db_connect('contact_data');
			$sql="Select `auto_id` from `accounts` where `username`='$username'";
			$result=$dblink->query($sql) or
				die("<h2>Something went wrong with $sql<br>".$dblink->error."</h2>");
			// Check for null
			if ($username==NULL)
			{
				$errors[]="usernameErr=null";
			}
			// Check if username already exists
			else if ($result->num_rows>0)
			{
				$errors[]="usernameErr=exists";
				$_SESSION['username']=$username;
			}
			else
			{
				// data was not null, store into session super global
				$_SESSION['username']=$username;
			}
			// Get the password and check for errors
			$password=$_POST['password'];
			// Check for null
			if ($password==NULL)
			{
				$errors[]="passwordErr=null";
			}
			else
			{
				// data was not null, store into session super global
				$_SESSION['password']=$password;
			}
			// Add errors to the url
			if (count($errors)>0)
			{
				$errorString=implode("&",$errors);
				redirect("register.php?$errorString");
			}
			else // No errors, insert into database
			{
				// Get data from the form
				$username=$_POST['username'];
				$password=$_POST['password'];
				// Sanitize data. Store in new variables to ensure that users only 
				// see their original input and not the sanitized data
				$s_username=addslashes($username);
	
				// Connect to database and create a salt to add to the hash
				$dblink=db_connect('contact_data');	
				$salt="CS4413fa24";
				// Create a hash using username, password, and salt for extra security
				$hash=hash('sha256',$username.$password.$salt);
				$sql="Insert into `accounts` (`username`,`hash`) values ('$s_username', '$hash')";
				$dblink->query($sql) or
					die("<h2>Something went wrong with $sql<br>".$dblink->error."</h2>");
				redirect("index.php?page=login&register=success");
			}
		}
		echo '		</div>';
		echo '	</div>';
		echo '</div>';
	?>
</body>
</html>