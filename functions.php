<!--
 * functions.php - Function definitions
 *
 * Functions for connecting to the database 
 * and redirecting to a given webpage.
 *
 * Author: Kaleb Phillips
 * Date: December 2 2024
 * Class: UTSA CS-4413-002 Web Technologies
 -->

<?php
function db_connect($db) {
	$dblink = new mysqli("localhost", "webuser", "password-here", $db);
	return $dblink;
}

function redirect($uri) {
	?>
	<script type="text/javascript">
		document.location.href="<?php echo $uri; ?>";
	</script>
	<?php die;
}
?>