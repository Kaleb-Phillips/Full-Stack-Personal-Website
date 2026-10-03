<!--
 * contact.php - Contact form page
 *
 * This page displays a contact form for a user to fill out.
 * Data is validated and sanitized before being stored into the database.
 * User's input is persistent on page refresh and detailed 
 * error feedback is provided.
 *
 * Author: Kaleb Phillips
 * Date: December 2 2024
 * Class: UTSA CS-4413-002 Web Technologies
 -->

 <div class="container">
	<div class="panel panel-default">
		<div class="panel-heading">
			<h3 class="panel-title">Contact</h3>
		</div>
		<div class="panel-body">
			<?php
				include("functions.php");
				// Create a session for this client connection
				session_start();
				// Turn on php to expose all errors/warnings, never do this in production!! ever!
				ini_set('display_errors', 1);
				ini_set('display_startup_errors', 1);
				error_reporting(E_ALL);
				if (!isset($_POST['submit']))
				{
					echo '<div class="section-title">
						<h3>Please fill out the contact form below</h3>
					</div>';
					echo '<form action="" method="post">';
					// If there was an error with first name
					if (isset($_GET['fnameErr']))
					{
						// Check which error occurred
						if ($_GET['fnameErr']=="null") 
						{
							// Blank error case
							echo '<div class="form-group has-error" id="firstNameGroup">
								<label class="control-label">First Name:</label>
								<input type="text" class="form-control" id="firstName" name="firstName">
								<span class="help-block" id="firstNameStatus">First Name cannot be blank!</span>
							</div>';
						}
						else if($_GET['fnameErr']=="invalid")
						{
							// Invalid character error case
							echo '<div class="form-group has-error" id="firstNameGroup">';
								echo '<label class="control-label">First Name:</label>';
								echo '<input type="text" class="form-control" id="firstName" name="firstName" value="'.$_SESSION['firstName'].'">';
								echo '<span class="help-block" id="firstNameStatus">First Name contains invalid characters!</span>';
							echo '</div>';
						}
					}
					else
					{
						// success state
						if (isset($_SESSION['firstName']))
						{
							echo '<div class="form-group has-success" id="firstNameGroup">';
								echo '<label class="control-label">First Name:</label>';
								echo '<input type="text" class="form-control" id="firstName" name="firstName" value="'.$_SESSION['firstName'].'">';
								echo '<span class="help-block" id="firstNameStatus"></span>';
							echo '</div>';
						}
						// defualt state
						else
						{
							echo '<div class="form-group" id="firstNameGroup">
								<label class="control-label">First Name:</label>
								<input type="text" class="form-control" id="firstName" name="firstName">
								<span class="help-block" id="firstNameStatus"></span>
							</div>';
						}
					}
					// If there was an error with last name
					if (isset($_GET['lnameErr']))
					{
						// Check which error occurred
						if ($_GET['lnameErr']=="null") 
						{
							// Blank error case
							echo '<div class="form-group has-error" id="lastNameGroup">
								<label class="control-label">Last Name:</label>
								<input type="text" class="form-control" id="lastName" name="lastName">
								<span class="help-block" id="lastNameStatus">Last Name cannot be blank!</span>
							</div>';
						}
						else if($_GET['lnameErr']=="invalid")
						{
							// Invalid character error case
							echo '<div class="form-group has-error" id="lastNameGroup">';
								echo '<label class="control-label">Last Name:</label>';
								echo '<input type="text" class="form-control" id="lastName" name="lastName" value="'.$_SESSION['lastName'].'">';
								echo '<span class="help-block" id="lastNameStatus">Last Name contains invalid characters!</span>';
							echo '</div>';
						}
					}
					else
					{
						// success state
						if (isset($_SESSION['lastName']))
						{
							echo '<div class="form-group has-success" id="lastNameGroup">';
								echo '<label class="control-label">Last Name:</label>';
								echo '<input type="text" class="form-control" id="lastName" name="lastName" value="'.$_SESSION['lastName'].'">';
								echo '<span class="help-block" id="lastNameStatus"></span>';
							echo '</div>';
						}
						// defualt state
						else
						{
							echo '<div class="form-group" id="lastNameGroup">
								<label class="control-label">Last Name:</label>
								<input type="text" class="form-control" id="lastName" name="lastName">
								<span class="help-block" id="lastNameStatus"></span>
							</div>';
						}
					}
					// If there was an error with email
					if (isset($_GET['emailErr']))
					{
						// Check which error occurred
						if ($_GET['emailErr']=="null") 
						{
							// Blank error case
							echo '<div class="form-group has-error" id="emailGroup">
								<label class="control-label">Email Address:</label>
								<input type="text" class="form-control" id="email" name="email">
								<span class="help-block" id="emailStatus">Email cannot be blank!</span>
							</div>';
						}
						else if($_GET['emailErr']=="invalid")
						{
							// Invalid email error case
							echo '<div class="form-group has-error" id="emailGroup">';
								echo '<label class="control-label">Email Address:</label>';
								echo '<input type="text" class="form-control" id="email" name="email" value="'.$_SESSION['email'].'">';
								echo '<span class="help-block" id="emailStatus">Invalid Email!</span>';
							echo '</div>';
						}
					}
					else
					{
						// success state
						if (isset($_SESSION['email']))
						{
							echo '<div class="form-group has-success" id="emailGroup">';
								echo '<label class="control-label">Email Address:</label>';
								echo '<input type="text" class="form-control" id="email" name="email" value="'.$_SESSION['email'].'">';
								echo '<span class="help-block" id="emailStatus"></span>';
							echo '</div>';
						}
						// defualt state
						else
						{
							echo '<div class="form-group" id="emailGroup">
								<label class="control-label">Email Address:</label>
								<input type="text" class="form-control" id="email" name="email">
								<span class="help-block" id="emailStatus"></span>
							</div>';
						}
					}
					// If there was an error with phone number
					if (isset($_GET['phoneErr']))
					{
						// Check which error occurred
						if ($_GET['phoneErr']=="null")
						{
							// Blank error case
							echo '<div class="form-group has-error" id="phoneGroup">
								<label class="control-label">Phone Number:</label>
								<input type="text" class="form-control" id="phone" name="phone">
								<span class="help-block" id="phoneStatus">Phone Number cannot be blank!</span>
							</div>';
						}
						else if($_GET['phoneErr']=="invalid")
						{
							// Invalid phone number error case
							echo '<div class="form-group has-error" id="phoneGroup">';
								echo '<label class="control-label">Phone Number:</label>';
								echo '<input type="text" class="form-control" id="phone" name="phone" value="'.$_SESSION['phone'].'">';
								echo '<span class="help-block" id="phoneStatus">Phone Number can only contain numbers!</span>';
							echo '</div>';
						}
						else if($_GET['phoneErr']=="length")
						{
							// Phone number length error case
							echo '<div class="form-group has-error" id="phoneGroup">';
								echo '<label class="control-label">Phone Number:</label>';
								echo '<input type="text" class="form-control" id="phone" name="phone" value="'.$_SESSION['phone'].'">';
								echo '<span class="help-block" id="phoneStatus">Phone Number must be exactly 10 digits!</span>';
							echo '</div>';
						}
					}
					else
					{
						// success state
						if (isset($_SESSION['phone']))
						{
							echo '<div class="form-group has-success" id="phoneGroup">';
								echo '<label class="control-label">Phone Number:</label>';
								echo '<input type="text" class="form-control" id="phone" name="phone" value="'.$_SESSION['phone'].'">';
								echo '<span class="help-block" id="phoneStatus"></span>';
							echo '</div>';
						}
						// defualt state
						else
						{
							echo '<div class="form-group" id="phoneGroup">
								<label class="control-label">Phone Number:</label>
								<input type="text" class="form-control" id="phone" name="phone">
								<span class="help-block" id="phoneStatus"></span>
							</div>';
						}
					}
					// If there was an error with username
					if (isset($_GET['usernameErr']))
					{
						// Check which error occurred
						if ($_GET['usernameErr']=="null")
						{
							// Blank error case
							echo '<div class="form-group has-error" id="usernameGroup">
								<label class="control-label">Username:</label>
								<input type="text" class="form-control" id="username" name="username">
								<span class="help-block" id="usernameStatus">Username cannot be blank!</span>
							</div>';
						}
						else if($_GET['usernameErr']=="length")
						{
							// Phone number length error case
							echo '<div class="form-group has-error" id="usernameGroup">';
								echo '<label class="control-label">Username:</label>';
								echo '<input type="text" class="form-control" id="username" name="username" value="'.$_SESSION['username'].'">';
								echo '<span class="help-block" id="usernameStatus">Username must be at least 6 characters!</span>';
							echo '</div>';
						}
					}
					else
					{
						// success state
						if (isset($_SESSION['username']))
						{
							echo '<div class="form-group has-success" id="usernameGroup">';
								echo '<label class="control-label">Username:</label>';
								echo '<input type="text" class="form-control" id="username" name="username" value="'.$_SESSION['username'].'">';
								echo '<span class="help-block" id="usernameStatus"></span>';
							echo '</div>';
						}
						// defualt state
						else
						{
							echo '<div class="form-group" id="usernameGroup">
								<label class="control-label">Username:</label>
								<input type="text" class="form-control" id="username" name="username">
								<span class="help-block" id="usernameStatus"></span>
							</div>';
						}
					}
					// If there was an error with password
					if (isset($_GET['passwordErr']))
					{
						// Check which error occurred
						if ($_GET['passwordErr']=="null")
						{
							// Blank error case
							echo '<div class="form-group has-error" id="passwordGroup">
								<label class="control-label">Password:</label>
								<input type="text" class="form-control" id="password" name="password">
								<span class="help-block" id="passwordStatus">Password cannot be blank!</span>
							</div>';
						}
						else if($_GET['passwordErr']=="length")
						{
							// Phone number length error case
							echo '<div class="form-group has-error" id="passwordGroup">';
								echo '<label class="control-label">Password:</label>';
								echo '<input type="text" class="form-control" id="password" name="password" value="'.$_SESSION['password'].'">';
								echo '<span class="help-block" id="passwordStatus">Password must be at least 6 characters!</span>';
							echo '</div>';
						}
					}
					else
					{
						// success state
						if (isset($_SESSION['password']))
						{
							echo '<div class="form-group has-success" id="passwordGroup">';
								echo '<label class="control-label">Password:</label>';
								echo '<input type="text" class="form-control" id="password" name="password" value="'.$_SESSION['password'].'">';
								echo '<span class="help-block" id="passwordStatus"></span>';
							echo '</div>';
						}
						// defualt state
						else
						{
							echo '<div class="form-group" id="passwordGroup">
								<label class="control-label">Password:</label>
								<input type="text" class="form-control" id="password" name="password">
								<span class="help-block" id="passwordStatus"></span>
							</div>';
						}
					}
					// If there was an error with comments
					if (isset($_GET['commentsErr']))
					{
						// Check which error occurred
						if ($_GET['commentsErr']=="null")
						{
							// Blank error case
							echo '<div class="form-group has-error" id="commentsGroup">
								<label class="control-label">Comments:</label>
								<textarea id="comments" class="form-control" name="comments"></textarea>
								<span class="help-block" id="commentsStatus">Comments cannot be blank!</span>
							</div>';
						}
					}
					else
					{
						// success state
						if (isset($_SESSION['comments']))
						{
							echo '<div class="form-group has-success" id="commentsGroup">';
								echo '<label class="control-label">Comments:</label>';
								echo '<textarea id="comments" class="form-control" name="comments">';
								echo htmlspecialchars($_SESSION['comments']); 
								echo '</textarea>';
								echo '<span class="help-block" id="commentsStatus"></span>';
							echo '</div>';
						}
						// defualt state
						else
						{
							echo '<div class="form-group" id="commentsGroup">
								<label class="control-label">Comments:</label>
								<textarea id="comments" class="form-control" name="comments"></textarea>
								<span class="help-block" id="commentsStatus"></span>
							</div>';
						}
					}
					// Submit button
					echo '<button class="custom-button" type="submit" name="submit"value="submit">Submit</button>';
					echo '</form>';
				}
				else 
				{
					$errors=array();
					// Get the first name and check for errors
					$firstName=$_POST['firstName'];
					// Check for null
					if ($firstName==NULL)
					{
						$errors[]="fnameErr=null";
					}
					// Check for alphabet characters only
					else if (preg_match("/^[A-Za-z'-]+$/", $firstName)==FALSE)
					{
						$errors[]="fnameErr=invalid";
						$_SESSION['firstName']=$firstName;
					}
					else
					{
						// data was not null, store into session super global
						$_SESSION['firstName']=$firstName;
					}
					// Get the last name and check for errors
					$lastName=$_POST['lastName'];
					// Check for null
					if ($lastName==NULL)
					{
						$errors[]="lnameErr=null";
					}
					// Check for alphabet characters only
					else if (preg_match("/^[A-Za-z'-]+$/", $lastName)==FALSE)
					{
						$errors[]="lnameErr=invalid";
						$_SESSION['lastName']=$lastName;
					}
					else
					{
						// data was not null, store into session super global
						$_SESSION['lastName']=$lastName;
					}
					// Get the email and check for errors
					$email=$_POST['email'];
					// Regex for valid email
					$validRegex = '/^(([^<>()[\]\\.,;:\s@"]+(\.[^<>()[\]\\.,;:\s@"]+)*)|.(".+"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/';
					// Check for null
					if ($email==NULL)
					{
						$errors[]="emailErr=null";
					}
					// Check for valid email
					else if (preg_match($validRegex, $email)==FALSE)
					{
						$errors[]="emailErr=invalid";
						$_SESSION['email']=$email;
					}
					else
					{
						// data was not null, store into session super global
						$_SESSION['email']=$email;
					}
					// Get the phone number and check for errors
					$phone=$_POST['phone'];
					// Check for null
					if ($phone==NULL)
					{
						$errors[]="phoneErr=null";
					}
					// Check for valid phone number
					else if (preg_match("/^[0-9]+$/", $phone)==FALSE)
					{
						$errors[]="phoneErr=invalid";
						$_SESSION['phone']=$phone;
					}
					// Check for phone number length
					else if (strlen($phone) != 10)
					{
						$errors[]="phoneErr=length";
						$_SESSION['phone']=$phone;
					}
					else
					{
						// data was not null, store into session super global
						$_SESSION['phone']=$phone;
					}
					// Get the username and check for errors
					$username=$_POST['username'];
					// Check for null
					if ($username==NULL)
					{
						$errors[]="usernameErr=null";
					}
					// Check for username length
					else if (strlen($username) < 6)
					{
						$errors[]="usernameErr=length";
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
					// Check for password length
					else if (strlen($password) < 6)
					{
						$errors[]="passwordErr=length";
						$_SESSION['password']=$password;
					}
					else
					{
						// data was not null, store into session super global
						$_SESSION['password']=$password;
					}
					// Get the comments and check for errors
					$comments=$_POST['comments'];
					// Check for null
					if ($comments==NULL)
					{
						$errors[]="commentsErr=null";
					}
					else
					{
						// data was not null, store into session super global
						$_SESSION['comments']=$comments;
					}
					// Add errors to the url
					if (count($errors)>0)
					{
						$errorString=implode("&",$errors);
						redirect("index.php?page=contact&$errorString");
					}
					else // No errors, insert into database
					{
						// Sanitize data. Store in new variables to ensure that users only 
						// see their original input and not the sanitized data
						$s_firstName=addslashes($firstName);
						$s_lastName=addslashes($lastName);
						$s_username=addslashes($username);
						$s_password=addslashes($password);
						$s_comments=addslashes($comments);
						
						// Set up link to connect to database
						$dblink = db_connect("contact_data");
						// Set up the sql to insert data
						$sql = "Insert into `contact_info` (`first_name`,`last_name`,`email`,`phone`,`username`,`password`,`comments`) values ('$s_firstName','$s_lastName','$email','$phone','$s_username','$s_password','$s_comments')";
						// Call the query method for our mysqli object in $dblink, or generate an error if the query was not successfull
						$dblink->query($sql) or
							die("<div class=\"section-title\"><h2>Something went wrong with $sql<br>".$dblink->error."</h2></div>");
						echo '<div class="section-title"><h3>Data sent to database!</h3></div>';
						
						/*
						// Debug block
						echo "<h3>First Name: $firstName</h3>";
						echo "<h3>Last Name: $lastName</h3>";
						echo "<h3>Email: $email</h3>";
						echo "<h3>Phone: $phone</h3>";
						echo "<h3>Username: $username</h3>";
						echo "<h3>Password: $password</h3>";
						echo "<h3>Comments: $comments</h3>";
						*/
					}
				}
			?>
			<br>
			<a class="custom-button" href="#top">Back to top</a>
		</div>
	</div>
	<section class="description_content">
	</section>
	<section class="description_content">
	</section>
	<section class="description_content">
	</section>
	<section class="description_content">
	</section>
	<section class="description_content">
	</section>
	<section class="description_content">
	</section>
	<section class="description_content">
	</section>
</div>