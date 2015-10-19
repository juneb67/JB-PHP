<!DOCTYPE html>
<html lang="en">
 
	<head>
    	<meta charset="utf-8">
    	<meta http-equiv="X-UA-Compatible" content="IE=edge">
    	<meta name="viewport" content="width=device-width, initial-scale=1">
    	<title><?php echo $title; ?></title>
    	<link href="vendor/twbs/bootstrap/dist/css/bootstrap.min.css" rel="stylesheet">
		<link rel="stylesheet" href="css/master.css">
	</head>
	
	<?php 
	
	$db_name = "junebowman_contact"; // Connect to this database

	// database connection
	require_once('/home/junebowman/private/db_connect2.php');

	?>
  
	<body>
	
		<div class="container">

			<header>
			
				<div class="row borderRow">
				
					<div class="col-md-6 col-sm-6 col-xs-12">
						
						<h3>Hello, I'm</h3>
						
						<h1 class="h1name">June Bowman</h1>
						
						<h4>a PHP and Front-End Developer</h4>
						
					</div><!-- End of col-md-6 -->

					<div class="col-md-6 col-sm-6 hidden-xs linkAlign">
					
						<img src="images/jb2.jpg" alt="Picture of June Bowman" title="June Bowman" class="img-rounded glow" 
						width="224" height="140" longdesc="http://www.junebowman.com/images/jb.jpg">
						
					</div><!-- End of col-md-6 -->
							
					<div class="col-xs-12 col-xs-offset-1 hidden-lg hidden-md hidden-sm">
					
						<img src="images/jb2.jpg" alt="Picture of June Bowman" title="June Bowman" class="img-rounded glow" 
						width="224" height="140" longdesc="http://www.junebowman.com/images/jb.jpg">
						
					</div><!-- End of col-md-6 -->

				</div><!-- end of row div-->
			
			
			<script LANGUAGE="javascript"> 
				width = screen.width; 
				height = screen.height; 
				//document.write("<b>You're set to "+width+ "X" +height+"</b>") 
			</script>

			<?php
$yo=$_GET['width'];
echo $yo;
?>
			
			
			
			
			
			
				<div class="row borderRow">
				
					<div class="col-md-8 col-sm-8 hidden-xs noPadding">
					
						<ul class="nav nav-pills code">
							<li><a href="#" title="Go To About Page">// About</a></li>
							<li><a href="https://github.com/juneb67" title="Go To GitHub Page" target="_blank">
								<?php echo '&#60;!-- Code --&#62;'; ?></a></li>
							<li><a href="#" title="Go To Portfolio Page"># Portfolio</a></li>
							<li><a href="#" title="Go To Contact Page">/* Contact</a></li>
						</ul>

					</div><!-- End of col-md-6 -->

					<div class="col-md-4 col-sm-4 hidden-xs noPadding"> 
					
						<div class="boxLines">
							<a href="https://www.linkedin.com/in/junebowman" target="_blank" title="Visit LinkedIn Profile">
							<img src="images/linkedinLogo.jpg" width="35" height="35"></a>
						</div><!-- End of div boxLines -->

						<div class="boxLines">
							<a href="https://github.com/juneb67" target="_blank" title="Visit GitHub Profile">
							<img src="images/GitHubLogo.jpg" width="36" height="35"></a>
						</div><!-- End of div boxLines -->
		
						<div class="boxLines">
							<a href="https://careers.stackoverflow.com/junebowman" target="_blank" title="Visit Stack Overflow Profile">
							<img src="images/StackOverflowLogo.jpg" width="27" height="35" border="0"></a>
						</div><!-- End of div boxLines -->
						
						<a href="mailto:juneb67@gmail.com" title="Email June Bowman">
						<span class="glyphicon glyphicon-envelope black" aria-hidden="true"></span></a>
						
					</div><!-- End of col-md-6 -->

					<div class="hidden-lg hidden-md hidden-sm">
					
						<ul class="nav nav-pills code">
							<li><a href="#" title="Go To About Page">About</a></li>
							<li><a href="https://github.com/juneb67" title="Go To GitHub Page" target="_blank">Code</a></li>
							<li><a href="#" title="Go To Portfolio Page">Portfolio</a></li>
							<li><a href="#" title="Go To Contact Page">Contact</a></li>
						</ul>

					</div><!-- End of col-md-6 -->
									
					<div class="col-md-4">
									
					</div><!-- End of col-md-6 -->
					
				</div><!-- End of row -->
					
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
							<a href="https://careers.stackoverflow.com/junebowman" target="_blank" title="Visit Stack Overflow Profile">
							<img src="images/StackOverflowLogo.jpg" width="27" height="35" border="0"></a>
						</div><!-- End of div boxLines -->
					
						<a href="mailto:juneb67@gmail.com" title="Email June Bowman">
						<span class="glyphicon glyphicon-envelope black" aria-hidden="true"></span></a>
						
					</div><!-- End of col-md-6 -->
					
				</div><!-- end of row -->

			</header>

