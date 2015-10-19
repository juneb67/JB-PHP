<?php
	$title = "June Bowman - PHP Developer";
	require 'includes/header.php';

?>


<content>

	<div class="row borderRow">
	
		<div class="col-md-6 whiteBk">
		
			<div class="blockA">
	
				<p class="big">I live and play in Louisville, KY. As a graduate of Code Louisville's Front-End program, 
				which featured a TreeHouse curriculum that focused on HTML 5, CSS, JavaScript and jQuery, I'm always 
				working on adding to my skill set. In keeping with that goal, I'm participating in Code Louisville's 
				Back-End program with a focus on PHP through November, 2015.</p>
			
				<p class="big">The PHP classes will add to my current knowledge of PHP, which I've used since 2002. 
				I'm currently working as a School IT Specialist at Nativity Academy at St. Boniface. 
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
				
				$i = $news["id"];
				$user_id = $news["user_id"];
				$news = $news["news"];

				echo '<div class="borderRowNews">' . $d. '<br>
				Contributor: ' . $name . '<br>'
				 . $news . '<br>';
				 ?>
				 <a href="#" data-toggle="modal" data-target="#changeModal<?php echo $i ?>">Change</a>
				 <?php
				 echo ' | <a href="delete.php?id=' . $news["user_id"] . '" title="Delete this item">Delete</a><br>
				 </div>';
				 
				?>				 
					<!-- Modal -->
					<div id="changeModal<?php echo $i ?>" class="modal fade" role="dialog">
					  <div class="modal-dialog">
						<!-- Modal content-->
						<div class="modal-content">
						  <div class="modal-header">
							<button type="button" class="close" data-dismiss="modal">&times;</button>
							<h4 class="modal-title dark">Change Item</h4>
						  </div>
						  <div class="modal-body">
								<?php 
									/*$input = '<p><script>alert("You won the Nigerian lottery!");</script></p>'; 
									echo htmlentities($input, ENT_QUOTES, 'UTF-8');*/
									echo '<p class="dark">The item you wish to change is:</p>
									<p class="darkBold">' . $news . '</p>
									<p class="dark">You will need to login below to change this item.</p>';
								?>
								
							  <form role="form" id="login" action="change.php" method="post">
								
								<div class="form-group dark">
								  <label for="email">Email:</label>
								  <input type="email" class="form-control" name="email" id="email" placeholder="Enter email">
								</div>
								
								<div class="form-group dark">
								  <label for="pwd">Password:</label>
								  <input type="password" class="form-control" name="pwd" id="pwd" placeholder="Enter password">
								</div>
								
								<input type="hidden" name="news_id" value="<?php echo $i; ?>">
								<input type="hidden" name="user_id" value="<?php echo $user_id; ?>">
								
								<button type="submit" class="btn btn-default">Login</button>
							  
							  </form>
						  
						  </div>
						  
						  <div class="modal-footer">
							<button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
						  </div>
						
						</div>
					  
					  </div>
					
					</div>
								 
				<?php				 
				 
			} //

			$db = null; // Close connection

			echo '<br><a href="add.php" title="Add Items">Add Items!</a> | ';

			?>

			<!-- Trigger the modal with a button -->
			<a href="#" data-toggle="modal" data-target="#myModal">Modal</a>
	
		</div><!-- End of col-md-6 div -->
	
	</div><!-- End of row div -->

</content>

<?php

	require 'includes/footer.php';

?>

