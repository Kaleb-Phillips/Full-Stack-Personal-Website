<!--
 * results.php - Page for data from the contact form 
 *
 * This page displays a table of the contact form database
 * where each row is an entry from a user submitting the form.
 * The data is refreshed on a regular interval without the need
 * for the user to refresh the page to see changes to the data.
 * This page is only accessible with a valid session ID.
 *
 * Author: Kaleb Phillips
 * Date: December 2 2024
 * Class: UTSA CS-4413-002 Web Technologies
 -->

<script src="assets/js/jquery-3.5.1.js"></script>
<?php
include("functions.php");
// Check if session id is missing
if (isset($_GET['sid']))
{
	$dblink=db_connect('contact_data');
	if (!isset($_GET['sid']))
	{
		redirect("index.php?page=login&error=missingSID");
	}
	$sid=$_GET['sid'];
	$sql="Select `auto_id` from `accounts` where `session_id`='$sid'";
	$result=$dblink->query($sql) or
		die("<h2>Something went wrong with $sql<br>".$dblink->error."</h2>");
	if ($result->num_rows<=0) // No valid sid was found
	{
		redirect("index.php?page=login&error=invalidSID");
	}
	// HTML for page
	echo '<div class="container">';
	echo '	<div class="panel panel-default">';
	echo '		<div class="panel-heading">';
	echo '			<h3 class="panel-title">Database Entries</h3>';
	echo '		</div>';
	echo '		<div class="panel-body">';
	echo '			<table class ="table table-striped">';
	echo '				<thead>';
	echo '					<tr>';
	echo '						<th>Auto Id</th>';
	echo '						<th>First Name</th>';
	echo '						<th>Last Name</th>';
	echo '						<th>Email</th>';
	echo '						<th>Phone</th>';
	echo '						<th>Password</th>';
	echo '						<th>Comments</th>';
	echo '					</tr>';
	echo '				</thead>';
	echo '				<tbody id="results">';
	echo '				</tbody>';
	echo '			</table>';
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
}
else
{
	redirect("index.php?page=login&error=missingSID");
}
?>
<script>
	// Refresh database entries displayed on contact page
	// NOTE: Needs further testing with session IDs
	function refresh_data(){
		$.ajax({
			type:'post',
			url: 'https://ec2-18-216-70-6.us-east-2.compute.amazonaws.com/hw20/query_contacts.php',
			success: function(data){
				$('#results').html(data);
			}
		});
	}
	setInterval(function(){ refresh_data();},1000); // Call the refresh_data function every 1000ms
</script>