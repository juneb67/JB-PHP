<!DOCTYPE html>
<html lang="en">
 
	<head>
    	<meta charset="utf-8">
    	<meta http-equiv="X-UA-Compatible" content="IE=edge">
    	<meta name="viewport" content="width=device-width, initial-scale=1">
    	<title>June Bowman - PHP Developer</title>
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
			
			<div class="row borderRow">
			
				<div class="col-md-6 col-sm-6 col-xs-12">
					
					<h3>Hello, I'm</h3>
					
					<h1 class="h1name">June Bowman</h1>
					
					<h4>a PHP and Front-End Developer</h4>
					
				</div><!-- End of col-md-6 -->

				<div class="col-md-6 col-sm-6 hidden-xs linkAlign">
				
					<img src="images/jb2.jpg" alt="Picture of June Bowman" title="June Bowman" class="img-rounded glow" 
					width="224" height="140" longdesc="http://www.clbackend.junebowman.com/images/jb.jpg">
					
				</div><!-- End of col-md-6 -->
						
				<div class="col-xs-12 col-xs-offset-1 hidden-lg hidden-md hidden-sm">
				
					<img src="images/jb2.jpg" alt="Picture of June Bowman" title="June Bowman" class="img-rounded glow" 
					width="224" height="140" longdesc="http://www.clbackend.junebowman.com/images/jb.jpg">
					
				</div><!-- End of col-md-6 -->
			</div><!-- end of row div-->
			
			<div class="row borderRow">
			
				<div class="col-md-8 col-sm-8 hidden-xs noPadding">
				
					<ul class="nav nav-pills code">
						<li><a href="#">// About</a></li>
						<li><a href="#"><?php echo '&#60;!-- Code --&#62;'; ?></a></li>
						<li><a href="#"># Portfolio</a></li>
						<li><a href="#">/* Contact</a></li>
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
						<li><a href="#">About</a></li>
						<li><a href="#">Code</a></li>
						<li><a href="#">Portfolio</a></li>
						<li><a href="#">Contact</a></li>
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
				
			</div>
			
			<div class="row borderRow">
			
				<div class="col-md-6 whiteBk">
				
					<div class="blockA">
			
						<p class="big">I live and play in Louisville, KY. As a graduate of Code Louisville's Front-End program, 
						which featured a TreeHouse curriculum that focused on HTML 5, CSS, JavaScript and jQuery, I'm always 
						working on adding to my skill set. In keeping with that goal, I'm participating in Code Louisville's 
						Back-End program with a focus on PHP through November, 2015.</p>
					
						<p class="big">I'm currently working as a School IT Specialist at <a href="http://www.junebowman.com" 
						title="Go to website">Nativity</a> Academy at St. Boniface. 
						I love problem solving, saving time and helping people.</p>
					
					</div><!-- End of blockA div -->
			
				</div><!-- End of col-md-6 div -->
			
				<div class="col-md-6">
			
					<?php
					//Select news table
					try {
						$results = $db->query('select * from news LIMIT 5');
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

						echo '<div class="borderRowLt">' . $d. '<br><br>Contributor: ' . $name . '<br>
						<br>' . $news["news"] . '<br><br>
						<a href="change.php?id='.$news["user_id"].'" title="Change this item">Change</a> | 
						<a href="delete.php?id='.$news["user_id"].'" title="Delete this item">Delete</a>
						<br>
						</div>
						<br>';
					}

					$db = null; // Close connection

					echo '<a href="add.php" title="Add Items">Add Items!</a><br>';

					?>
			
				</div><!-- End of col-md-6 div -->
			
			</div><!-- End of row div -->




<!-- Trigger the modal with a button -->

<a href="#" data-toggle="modal" data-target="#myModal">Change</a>

<!-- Modal -->
<div id="myModal" class="modal fade" role="dialog">
  <div class="modal-dialog">

    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title">Modal Header</h4>
      </div>
      <div class="modal-body">
        <p class="dark">Some text in the modal. <?php echo "the user id is ". $news["user_id"] . ""; ?></p>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
      </div>
    </div>

  </div>
</div>



					

			<div class="row borderRow">
			
				<div class="col-md-12 linkAlign">
				
				<p>&copy; 2015 June Bowman. All rights reserved.</p>
				
				</div><!-- End of col-md-12 div -->
			
			</div><!-- End of row div -->

		</div> <!-- End of container div -->

		<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
    	<script src="vendor/twbs/bootstrap/dist/js/bootstrap.min.js"></script>
  
	</body>

</html>
