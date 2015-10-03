<?php

require __DIR__ . '/vendor/autoload.php';
date_default_timezone_set('America/New_York');

$db_name = "junebowman_contact"; // Connect to this database

// database connection script
require_once('/home/junebowman/private/db_connect2.php');

if(!empty($_GET['id'])){
  
  $user_id = intval($_GET['id']);
  try {
	$results = $db->prepare('select * from users where id = ?');
	$results->bindParam(1, $user_id);
	$results->execute();
  } catch(Exception $e) {
	echo $e->getMessage();
	die();
  }

  $user = $results->fetch(PDO::FETCH_ASSOC);
  if($user == FALSE){
	echo 'Sorry, there is no user with that ID.';
	die();
  } 
  
}


echo '<br>The user is: '. $user["name"] . ' ' . $user["email"] . '.<br><br>';
print_r($user);

?>
