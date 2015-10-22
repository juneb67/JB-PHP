<?php
$title = "Add Item";
require_once 'includes/header.php';
$db_name = "junebowman_contact"; // Choose database to connect to
require_once('/home/junebowman/private/db_connect2.php'); // database connection script

if ($_SERVER['REQUEST_METHOD'] != 'POST') { 
	echo '<div class="borderRow">';
	echo "<h4>You have reached this page by mistake.</h4>";
	echo '<a href="/">http://www.junebowman.com</a>';
	echo '</div>';
	require_once 'includes/footer.php';
	die();
}

if (isset($_POST["add_item"])) {
	//The news and user_id values
	$news = trim($_POST["news"]);
	$user_id = $_POST["user_id"];
	$d = date("Y-n-j");
	 
try {
    // sql to add a record
	$sql = "INSERT INTO news (date, news, user_id) VALUES ('$d', '$news', $user_id)";

    // use exec() because no results are returned
    $db->exec($sql);
	echo '<h4>The record was added successfully. Return to the home page to see the results.</h4>';
    }
catch(PDOException $e)
    {
    echo $sql . "<br>" . $e->getMessage();
    }

$db = null;	
	
	echo '<div class="borderRow">';
	echo '<a href="/">http://www.junebowman.com</a>';
	echo '</div>';
	require_once 'includes/footer.php';
	die();
}

if (!filter_input(INPUT_POST, "email", FILTER_VALIDATE_EMAIL)) {
	echo '<div class="borderRow">';
	echo "<h4>The email address you entered is not valid. Use your browser's back button and 
		enter a valid email address.</h4><br><br>";
	echo '</div>';
	require_once 'includes/footer.php';
	die();
} else {
	$email = $_POST["email"];
	$pwd = trim($_POST['pwd']);
	try {
		$results = $db->prepare('select * from users where email = ?');
		$results->bindParam(1, $email);
		$results->execute();
		$email = $results->fetch(PDO::FETCH_ASSOC);
		$name = $email["name"];
		$user_id = $email["id"];
		if($email) {
			$password = $email["password"];
			if (crypt($pwd, $password) == $password) {
				echo '<div class="borderRow">';
				echo "<h4>Hello, $name!</h4>";
				try {
					$results = $db->prepare('select * from news where id = ?');
					$results->bindParam(1, $news_id);
					$results->execute();
					$news = $results->fetch(PDO::FETCH_ASSOC);
					$news = $news["news"];
				} catch(Exception $e) {
					echo $e->getMessage();
					require_once 'includes/footer.php';
					die();
				}
				?>
				<form role="form" id="add_item" action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post">
				
					<label for="news">Add item to the home page:</label><br>
				  
					<div class="form-group dark">
						<textarea name="news" class="form-control" placeholder="Add your update here.." 
						data-placement="top" data-trigger="manual"></textarea>					
					</div>
					
					<input type="hidden" name="user_id" value="<?php echo $user_id; ?>">
			
					<button type="submit" class="btn btn-default" name="add_item">Add Item</button>
			  
				</form>

				<?php
				
				
				echo '</div>';
			} else {
				echo '<div class="borderRow">';
				echo "<h4>The password you entered is not correct.Use your browser's back button and try again.</h4>";
				echo '</div>';
				require_once 'includes/footer.php';
				die();
			}
		} else {
			echo '<div class="borderRow">';
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
