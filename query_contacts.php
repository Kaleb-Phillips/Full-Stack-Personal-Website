<!--
 * query_contacts.php - Runs the query for the contact form data
 *
 * Called by the AJAX in results.php to retrieve the contact 
 * form data in the database and display it as a table.
 *
 * Author: Kaleb Phillips
 * Date: December 2 2024
 * Class: UTSA CS-4413-002 Web Technologies
 -->

<?php
session_start();
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
	else{
		$sql="select * from `contact_info`";
		$results=$dblink->query($sql) or
			die("<h2>Something went wrong with $sql<br>".$dblink->error."</h2>");
		// Display data from database inside the table
		while ($info=$results->fetch_array(MYSQLI_ASSOC))
		{
			echo "<tr>";
			echo "<td>$info[auto_id]</td>";
			echo "<td>$info[first_name]</td>";
			echo "<td>$info[last_name]</td>";
			echo "<td>$info[email]</td>";
			echo "<td>$info[phone]</td>";
			echo "<td>$info[password]</td>";
			echo "<td>$info[comments]</td>";
			echo "</tr>";
		}
	}
}
else
{
	redirect("index.php?page=login&error=missingSID");
}
?>