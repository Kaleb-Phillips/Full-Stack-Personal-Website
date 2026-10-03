<!--
 * index.php - Loads page content from other files
 *
 * This file loads the navigation bar, footer, and general
 * content of the webpage by including the appropriate files.
 *
 * Author: Kaleb Phillips
 * Date: December 2 2024
 * Class: UTSA CS-4413-002 Web Technologies
 -->

<!DOCTYPE html>
<html>
<head>
<title>Welcome to Kaleb's Website</title>
	<!-- Bootstrap css -->
	<link href="./assets/css/bootstrap.css" rel="stylesheet"/>
	<link href="./assets/css/bootstrap-theme.css" rel="stylesheet"/>
	
	<!-- Template css -->
	<link rel="stylesheet" href="./assets/css/normalize.css">
	<link rel="stylesheet" href="./assets/css/main.css" media="screen" type="text/css">
	<link href="http://fonts.googleapis.com/css?family=Pacifico" rel="stylesheet" type="text/css">
	<link href="http://fonts.googleapis.com/css?family=Playball" rel="stylesheet" type="text/css">
	<link rel="stylesheet" href="./assets/css/bootstrap.css">
	<link rel="stylesheet" href="./assets/css/style-portfolio.css">
	<link rel="stylesheet" href="./assets/css/picto-foundry-food.css" />
	<link rel="stylesheet" href="./assets/css/jquery-ui.css">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link href="./assets/css/font-awesome.min.css" rel="stylesheet">
	<!-- ==========================================================================
		Template Name: Restaurant
		Template URL: https://themewagon.com/themes/bootstrap-food-restaurant-website-template-free-download-2017/
		Author: ThemeWagon
		Author URL: https://themewagon.com/
	=========================================================================== -->
	
	<!-- Custom css -->
	<link href="./assets/css/styles.css" rel="stylesheet"/>
</head>
<body>
	<nav class="navbar navbar-default navbar-fixed-top" role="navigation">
		<div class="container">
			<div class="row">
				<!-- Brand and toggle get grouped for better mobile display -->
				<div class="navbar-header">
					<button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
						<span class="sr-only">Toggle navigation</span>
						<span class="icon-bar"></span>
						<span class="icon-bar"></span>
						<span class="icon-bar"></span>
					</button>
					<a class="navbar-brand" href="./">Welcome to Kaleb's website</a>
				</div>
				<?php
					include("navigation.php");
				?>	
			</div>
		</div><!-- /.container-fluid -->
	</nav>

	<div class="top_container">
	</div>
	
	<?php
	// Content/body of my index.php
	if(isset($_GET['page']))
	{
		// Only set variable when the page array key has been defined
		$page = $_GET['page'];
		switch($page) {
		case "work":
			include("work.php");
			break;
		case "school":
			include("school.php");
			break;
		case "hobbies":
			include("hobbies.php");
			break;
		case "contact":
			include("contact.php");
			break;
		case "results":
			include("results.php");
			break;
		case "login":
			include("login.php");
			break;
		default:
			include("home.php");
			break;
		}
	}
	else
		include("home.php");
	?>
	
<!-- ============ Footer Section  ============= -->
<footer class="sub_footer">
	<div class="container">
		<div class="col-md-4">
			<p class="sub-footer-text text-center">&copy; Restaurant 2014, Theme by 
				<a href="https://themewagon.com/">ThemeWagon</a>
			</p>
		</div>
		<div class="col-md-4">
			<p class="sub-footer-text text-center">
				<a href="#top">Back to top</a>
			</p>
		</div>
	</div>
</footer>
</body>
</html>
