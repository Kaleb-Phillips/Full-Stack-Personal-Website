<!--
 * login.php - Login page for existing users
 *
 * This page displays a form for users to enter login credentials
 * to sign in to an account. If there are no errors, and the credentials
 * match an existing account, the user is signed in to the account and 
 * a new session id is linked to the account.
 *
 * Author: Kaleb Phillips
 * Date: December 2 2024
 * Class: UTSA CS-4413-002 Web Technologies
 -->

<?php
// HTML for page
echo '<div class="container">';
echo '	<div class="panel panel-default">';
echo '		<div class="panel-heading">';
echo '			<h3 class="panel-title">Log In</h3>';
echo '		</div>';
echo '		<div class="panel-body">';
// Check for newly registered
if(isset($_GET['register']))
{	
	// Display success message
	if($_GET['register']=="success")
	{
		echo '	<h3 class="success-alert">Account Successfully Registered!</h3>';
	}
}
// Check for error
if(isset($_GET['error']))
{	
	// Display invalid login message
	if($_GET['error']=="authError")
	{
		echo '	<h3 class="error-alert">Invalid Log In Credentials</h3>';
	}
	// Display missing session message
	else if($_GET['error']=="missingSID")
	{
		echo '	<h3 class="error-alert">Missing Session ID</h3>';
	}
	// Display invalid session message
	else if($_GET['error']=="invalidSID")
	{
		echo '	<h3 class="error-alert">Invalid Session ID</h3>';
	}
}
echo '			<h3>please log in to continue</h3>';
echo '			<form method="post" action="">';
echo '				<div class ="form-group">';
echo '					<label class="control-label">Username:</label>';
echo '					<input name="username" type="text" class="form-control">';
echo '					<div id="unFeedback"></div>';
echo '				</div>';
echo '				<div class ="form-group">';
echo '					<label class="control-label">Password:</label>';
echo '					<input name="password" type="password" class="form-control">';
echo '					<div id="pwFeedback"></div>';
echo '				</div>';
echo '				<button class="btn btn-primary" type="submit" name="submit" value="submit">Submit</button>';
echo '			</form>';
echo '		</div>';
echo '	</div>';
echo '	<section class="description_content">';
echo '	</section>';
echo '	<section class="description_content">';
echo '	</section>';
echo '	<section class="description_content">';
echo '	</section>';
echo '	<section class="description_content">';
echo '	</section>';
echo '	<section class="description_content">';
echo '	</section>';
echo '	<section class="description_content">';
echo '	</section>';
echo '	<section class="description_content">';
echo '	</section>';
echo '</div>';
if (isset($_POST['submit']))
{
	$username=$_POST['username'];
	$password=$_POST['password'];
	include("functions.php");
	$dblink=db_connect('contact_data');
	$salt="CS4413fa24";
	// Create a hash using username, password, and salt for extra security
	$hash=hash('sha256',$username.$password.$salt);
	$sql="Select `auto_id` from `accounts` where hash='$hash'";
	$result=$dblink->query($sql) or
		die("<h2>Something went wrong with $sql<br>".$dblink->error."</h2>");
	if ($result->num_rows>0) // Password matched
	{
		$data=$result->fetch_array(MYSQLI_ASSOC);
		$SIDsalt=microtime(); // Randomized salt
		// Create a session id
		$sid=hash('sha256',$hash.$SIDsalt);
		$sql="Update `accounts` set `session_id`='$sid' where `auto_id`='$data[auto_id]'";
		$dblink->query($sql) or
			die("<h2>Something went wrong with $sql<br>".$dblink->error."</h2>");
		redirect("index.php?page=results&sid=$sid");
	}
	else // Password did not match
	{
		redirect("index.php?page=login&error=authError");
	}
}
?>