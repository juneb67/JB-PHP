<?php $title = "Contact June Bowman"; ?>

<!DOCTYPE html>
<html lang="en">
 
	<head>
    	<meta charset="utf-8">
    	<meta http-equiv="X-UA-Compatible" content="IE=edge">
    	<meta name="viewport" content="width=device-width, initial-scale=1">
    	<title><?php echo $title; ?></title>
    	<link href="vendor/twbs/bootstrap/dist/css/bootstrap.min.css" rel="stylesheet">
		<link rel="stylesheet" href="css/master.css">
		<link rel="icon" type="image/png" href="images/icon.png">		

	</head>
	
	<?php 
	
	$db_name = "junebowman_contact"; // Connect to this database

	// database connection
	require_once('/home/junebowman/private/db_connect2.php');

	?>
  
	<body>
	
		<div class="container">

			<header>
			
				<?php
				$page = $_SERVER["PHP_SELF"];
				if ($page === "/index.php" || $page === "/index2.php") {
					?>
					
					<div class="row borderRow">
					
						<div class="col-lg-12 rtPadding">
					
							<div class="col-md-8 col-sm-7 col-xs-12 rtPadding">
								<div class="row">
									<div class="col-md-12 textContainer"><h3>Hello, I'm</h3></div>
								</div>	
								<div class="row">
									<div class="col-md-12 h1Container">
									<h1 class="h1name">June Bowman</h1>
									</div>
								</div>	
								<div class="row">
									<div class="col-md-12 h4Container"><h4>a PHP and Front-End Developer</h4></div>
								</div>	
							</div>
							
							<div class="col-md-4 col-sm-5 picContainer">
								<img src="images/jb4.jpg" alt="Picture of June Bowman" title="June Bowman" 
								class="img-rounded glow img-responsive" width="308" height="193" 
								longdesc="http://www.junebowman.com/images/jb.jpg">
							</div>
						
						</div>
				
					</div><!-- End of Row -->
					
					
				<?php
				}
				?>

				<div class="row borderRow">
				
					<div class="col-md-8 col-sm-8 hidden-xs noPadding">
					
						<ul class="nav nav-pills code">
							<?php
							if ($page !== "/index2.php" && $page!=="/index.php"){
								echo '<li><a href="/" title="Go To Home Page">**Home**</a></li>';
							}
							if ($page !== "/about.php"){
								echo '<li><a href="/about" title="Go To About Page">// About</a></li>';
							}
							echo '<li><a href="https://github.com/juneb67" title="Go To GitHub Page" target="_blank">
								&#60;!-- Code --&#62;</a></li>';
							if ($page !== "/portfolio.php"){
								echo '<li><a href="/portfolio" title="Go To Portfolio Page"># Portfolio</a></li>';
							}
							if ($page !== "/contact.php"){
								echo '<li><a href="" title="Contact Form" data-toggle="modal" data-target="#contactModal">/* Contact</a></li>';
							}
							?>
						</ul>

					</div><!-- End of col-md-6 -->

					<div class="col-md-4 col-sm-4 hidden-xs"> 
					
						<div class="boxLines">
							<a href="https://www.linkedin.com/in/junebowman" target="_blank" title="Visit LinkedIn Profile">
							<img src="images/linkedinLogo.jpg" width="35" height="35"></a>
						</div><!-- End of div boxLines -->

						<div class="boxLines">
							<a href="https://github.com/juneb67" target="_blank" title="Visit GitHub Profile">
							<img src="images/GitHubLogo.jpg" width="36" height="35"></a>
						</div><!-- End of div boxLines -->
		
						<div class="boxLines">
							<a href="https://careers.stackoverflow.com/junebowman" target="_blank" 
							title="Visit Stack Overflow Profile">
							<img src="images/StackOverflowLogo.jpg" width="27" height="35" border="0"></a>
						</div><!-- End of div boxLines -->
						
						<a href="mailto:juneb67@gmail.com" title="Email June Bowman">
						<span class="glyphicon glyphicon-envelope black" aria-hidden="true"></span></a>
						
					</div><!-- End of col-md-6 -->

					<div class="hidden-lg hidden-md hidden-sm">
					
						<ul class="nav nav-pills code">
							<?php
							if ($page !== "/index2.php" && $page!=="/index.php"){
								echo '<li><a href="/" title="Go To Home Page">Home</a></li>';
							}
							if ($page !== "/about.php"){
								echo '<li><a href="/about" title="Go To About Page">About</a></li>';
							}
							echo '<li><a href="https://github.com/juneb67" title="Go To GitHub Page" target="_blank">Code</a></li>';
							if ($page !== "/portfolio.php"){
								echo '<li><a href="/portfolio" title="Go To Portfolio Page">Portfolio</a></li>';
							}
							if ($page !== "/contact.php" && $page!=="/contact2.php"){
								echo '<li><a href="" title="Contact Form" data-toggle="modal" 
								data-target="#contactModal">Contact</a></li>';
							}
							?>
						</ul>

					</div><!-- End of col-md-6 -->
									
					<div class="col-md-4 colSpace">
									
					</div><!-- End of col-md-6 -->
					
				</div><!-- End of row -->
				
				<!-- Contact Modal -->
				<div id="contactModal" class="modal fade" role="dialog">
				  <div class="modal-dialog">
					<!-- Modal content-->
					<div class="modal-content">
					  <div class="modal-header">
						<button type="button" class="close" data-dismiss="modal">&times;</button>
						<h4 class="modal-title dark">Contact Me!</h4>
					  </div>
					  <div class="modal-body dark">
							<p>Please fill out the form below. I will get back to you as soon as possible.</p>
						  
						  
						  
						  
		<div id="form-messages"></div>
		<hr>
		<form id="ajax-contact" method="post" action="contact/mailer.php">
			<div class="field form-group">
				<label for="con_name">Name:</label>
				<input type="text" id="con_name" name="con_name" class="form-control dark" placeholder="Enter your name" required>
			</div>

			<div class="field form-group">
				<label for="con_email">Email:</label>
				<input type="email" id="con_email" name="con_email" class="form-control dark" 
				placeholder="Enter your email address" required>
			</div>
			
			<div class="field form-group">
				<label for="con_message">Message:</label>
				<textarea id="con_message" name="con_message" class="form-control dark" 
				placeholder="Your message here..." required></textarea>
			</div>			

			<div class="field">
				<button type="submit" class="btn btn-default">Send</button>
			</div>
		</form>
						  
						  
						  
						  
						  
					  </div>
					</div>
				  </div>
				</div>
					
				<div class="row">

					<div class="col-xs-12 col-xs-offset-1 hidden-lg hidden-md hidden-sm topPadding"> 
					
						<div class="boxLines">
							<a href="https://www.linkedin.com/in/junebowman" target="_blank" title="Visit LinkedIn Profile">
							<img src="images/linkedinLogo.jpg" width="35" height="35"></a>
						</div><!-- End of div boxLines -->

						<div class="boxLines">
							<a href="https://github.com/juneb67" target="_blank" title="Visit GitHub Profile">
							<img src="images/GitHubLogo.jpg" width="36" height="35"></a>
						</div><!-- End of div boxLines -->
		
						<div class="boxLines">
							<a href="https://careers.stackoverflow.com/junebowman" target="_blank" 
							title="Visit Stack Overflow Profile">
							<img src="images/StackOverflowLogo.jpg" width="27" height="35" border="0"></a>
						</div><!-- End of div boxLines -->
					
						<a href="mailto:juneb67@gmail.com" title="Email June Bowman">
						<span class="glyphicon glyphicon-envelope black" aria-hidden="true"></span></a>
						
					</div><!-- End of col-md-6 -->
					
				</div><!-- end of row -->

			</header>






	<div id="page-wrapper">
	  <h1>AJAX Contact Form Demo</h1>

	
	</div><!-- End of page wrapper -->
	



<?php
require 'includes/footer.php';
?>
    
