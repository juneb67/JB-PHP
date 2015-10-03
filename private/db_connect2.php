<?php

//remove before flight
ini_set('display_errors', 'On');

$user = "junebowman";
$pass = "whiteduk1";

$db = new PDO('mysql:host=localhost;dbname=' . $db_name . '', $user, $pass);

var_dump($db);

$db = null;

?>