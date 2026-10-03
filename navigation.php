<!--
 * navigation.php - Navigation bar at the top of the website
 *
 * This is the navigation bar for the website, which is 
 * at the top of the page at all times.
 * Changes appearance to indicate the currently active page.
 *
 * Author: Kaleb Phillips
 * Date: December 2 2024
 * Class: UTSA CS-4413-002 Web Technologies
 -->

<?php
echo '<div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">';
echo '<ul class="nav navbar-nav main-nav  clear navbar-right ">';
// Check if the page variable has been set
if(isset($_GET['page']))
{
	// Only use GET when the page array key has been defined
	$page = $_GET['page'];
	// Determine the active page
	switch($page) {
		case "work":
			echo '<li><a class="color_animation" href="./">Home</a></li>';
			echo '<li><a class="navactive color_animation" href="index.php?page=work">Work</a></li>';
			echo '<li><a class="color_animation" href="index.php?page=school">School</a></li>';
			echo '<li><a class="color_animation" href="index.php?page=hobbies">Hobbies</a></li>';
			echo '<li><a class="color_animation" href="index.php?page=contact">Contact</a></li>';
			echo '<li><a class="color_animation" href="index.php?page=login">Log In</a></li>';
			break;
		case "school":
			echo '<li><a class="color_animation" href="./">Home</a></li>';
			echo '<li><a class="color_animation" href="index.php?page=work">Work</a></li>';
			echo '<li><a class="navactive color_animation" href="index.php?page=school">School</a></li>';
			echo '<li><a class="color_animation" href="index.php?page=hobbies">Hobbies</a></li>';
			echo '<li><a class="color_animation" href="index.php?page=contact">Contact</a></li>';
			echo '<li><a class="color_animation" href="index.php?page=login">Log In</a></li>';
			break;
		case "hobbies":
			echo '<li><a class="color_animation" href="./">Home</a></li>';
			echo '<li><a class="color_animation" href="index.php?page=work">Work</a></li>';
			echo '<li><a class="color_animation" href="index.php?page=school">School</a></li>';
			echo '<li><a class="navactive color_animation" href="index.php?page=hobbies">Hobbies</a></li>';
			echo '<li><a class="color_animation" href="index.php?page=contact">Contact</a></li>';
			echo '<li><a class="color_animation" href="index.php?page=login">Log In</a></li>';
			break;
		case "contact":
			echo '<li><a class="color_animation" href="./">Home</a></li>';
			echo '<li><a class="color_animation" href="index.php?page=work">Work</a></li>';
			echo '<li><a class="color_animation" href="index.php?page=school">School</a></li>';
			echo '<li><a class="color_animation" href="index.php?page=hobbies">Hobbies</a></li>';
			echo '<li><a class="navactive color_animation" href="index.php?page=contact">Contact</a></li>';
			echo '<li><a class="color_animation" href="index.php?page=login">Log In</a></li>';
			break;
		case "login":
			echo '<li><a class="color_animation" href="./">Home</a></li>';
			echo '<li><a class="color_animation" href="index.php?page=work">Work</a></li>';
			echo '<li><a class="color_animation" href="index.php?page=school">School</a></li>';
			echo '<li><a class="color_animation" href="index.php?page=hobbies">Hobbies</a></li>';
			echo '<li><a class="color_animation" href="index.php?page=contact">Contact</a></li>';
			echo '<li><a class="navactive color_animation" href="index.php?page=login">Log In</a></li>';
			break;
		default:
			echo '<li><a class="navactive color_animation" href="./">Home</a></li>';
			echo '<li><a class="color_animation" href="index.php?page=work">Work</a></li>';
			echo '<li><a class="color_animation" href="index.php?page=school">School</a></li>';
			echo '<li><a class="color_animation" href="index.php?page=hobbies">Hobbies</a></li>';
			echo '<li><a class="color_animation" href="index.php?page=contact">Contact</a></li>';
			echo '<li><a class="color_animation" href="index.php?page=login">Log In</a></li>';
			break;
	}
}
else
{
	// The page variable is not set, so use the default case
	echo '<li><a class="navactive color_animation" href="./">Home</a></li>';
	echo '<li><a class="color_animation" href="index.php?page=work">Work</a></li>';
	echo '<li><a class="color_animation" href="index.php?page=school">School</a></li>';
	echo '<li><a class="color_animation" href="index.php?page=hobbies">Hobbies</a></li>';
	echo '<li><a class="color_animation" href="index.php?page=contact">Contact</a></li>';
	echo '<li><a class="color_animation" href="index.php?page=login">Log In</a></li>';
}
echo '</ul>';
echo '</div>';
?>