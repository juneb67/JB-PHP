<?php

require __DIR__ . '/vendor/autoload.php';
date_default_timezone_set('America/New_York');

$db_name = "junebowman_contact"; // Connect to this database

// database connection script
//include('/home/junebowman/private/db_connect2.php');
require_once('/home/junebowman/private/db_connect2.php');

//Do database stuff
try {
	$results = $db->query('select * from news');
} catch(Exception $e) {
	echo $e->getMessage();
	die();
}

$news = $results->fetchAll(PDO::FETCH_ASSOC);

foreach($news as $news){

	$user_id = $news["user_id"];

	$results2 = $db->query("select id, name from users WHERE id = $user_id");
	$user = $results2->fetchAll(PDO::FETCH_ASSOC);
	
	foreach($user as $user){
		$name = $user["name"];
	}

	$d = $news["date"];
	$time = strtotime($d);
	$d = date("m.d.y", $time);

	echo $d. '<br><br>Contributor: ' . $name . '<br>
	<br>' . $news["news"] . '<br><br>
	<a href="change.php?id='.$news["id"].'">Change</a> | 
	<a href="delete.php?id='.$news["id"].'">Delete</a>
	<br>
	<br>
	<hr width="100%">
	<br>';
}

$db = null; // Close connection

echo "Add news!<br><br>";

//$log = new Monolog\Logger('name');
//$log->pushHandler(new Monolog\Handler\StreamHandler('app.txt', Monolog\Logger::WARNING));
//$log->addWarning('Mike Bowman 9-6-2015');

$app = new \Slim\Slim( array (
	'view' => new \Slim\Views\Twig()
));
$view = $app->view();
$view->parserOptions = array(
    'debug' => true
);
$view->parserExtensions = array(
    new \Slim\Views\TwigExtension(),
);

$app->get('/', function () use($app) {
    $app->render('about.twig');
})->name('home');

$app->get('/contact', function () use($app) {
    $app->render('contact.twig');
})->name('contact');

$app->post('/contact', function () use($app) {
	$name = $app->request->post('name');
	$email = $app->request->post('email');
	$msg = $app->request->post('msg');
	
	if(!empty($name) && !empty($email) && !empty($msg)) {
		$cleanName = filter_var($name, FILTER_SANITIZE_STRING);
		$cleanEmail = filter_var($email, FILTER_SANITIZE_EMAIL);
		$cleanMsg = filter_var($msg, FILTER_SANITIZE_STRING);
	} else {
		//message the user that there was a problem
		$app->redirect('/contact');	
	}

	//Creat a transport
	$transport = Swift_SendmailTransport::newInstance('/usr/sbin/sendmail -bs');

	//Creat a mailer
	$mailer = \Swift_Mailer::newInstance($transport);

	//Compose message object
	$message = \Swift_Message::newInstance();
	$message->setSubject('Email From Our Website');
	$message->setFrom(array(
		$cleanEmail => $cleanName
	));
	$message->setTo(array('juneb67@gmail.com'));
	$message->SetBody($cleanMsg);

	$result = $mailer->send($message);

	if($result > 0){
		//send a message to say thank you
		$app->redirect('/');
	} else {
		// send a message to the user that it failed
		//log that there was an error
		$app->redirect('/contact');
	}

});

$app->run();

?>

<script src="//platform.linkedin.com/in.js" type="text/javascript"></script>
<script type="IN/MemberProfile" data-id="https://www.linkedin.com/in/junebowman" data-format="inline" data-related="false"></script>

