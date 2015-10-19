<?php
$title = "Change Item";
require_once 'includes/header.php';
$db_name = "junebowman_contact"; // Choose database to connect to
require_once('/home/junebowman/private/db_connect2.php'); // database connection script

if ($_SERVER['REQUEST_METHOD'] != 'POST') { 
	echo '<div class="borderRowCenter">';
	echo "<h4>You have reached this page by mistake.</h4>";
	echo '<a href="/">http://www.junebowman.com</a>';
	echo '</div>';
	require_once 'includes/footer.php';
	die();
}

if (!filter_input(INPUT_POST, "email", FILTER_VALIDATE_EMAIL)) {
	echo '<div class="borderRowCenter">';
	echo "<h2>The email address you entered is not valid. Enter a valid email address.</h2>";
	echo '<a href="index.php">Please try again.</a>';
	echo '</div>';
	require_once 'includes/footer.php';
	die();
} else {
	$news_id = $_POST["news_id"];
	$user_id = $_POST["user_id"];
	$email = $_POST["email"];
	$pwd = trim($_POST['pwd']);
	try {
		$results = $db->prepare('select * from users where email = ?');
		$results->bindParam(1, $email);
		$results->execute();
		$email = $results->fetch(PDO::FETCH_ASSOC);
		if($email) {
			$password = $email["password"];
			if (crypt($pwd, $password) == $password) {
				echo '<div class="borderRowCenter">';
				echo "<h4>Your password is correct</h4>";
				echo '</div>';
			} else {
				echo '<div class="borderRowCenter">';
				echo "<h2>The password you entered is not correct.</h2>";
				echo '<a href="index.php">Please try again.</a>';
				echo '</div>';
				require_once 'includes/footer.php';
				die();
			}
		} else {
			echo '<div class="borderRowCenter">';
			echo "<h2>The email address you entered is not on file.</h2>";
			echo '<a href="index.php">Please try again.</a>';
			echo '</div>';
			require_once 'includes/footer.php';
			die();
		}	
	} catch(Exception $e) {
		echo $e->getMessage();
		require_once 'includes/footer.php';
		die();
	}

}	

require_once 'includes/footer.php';

?>
