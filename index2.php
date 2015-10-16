<?php

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

				echo '<div class="borderRowNews">' . $d. '<br>
				Contributor: ' . $name . '<br>'
				 . $news["news"] . '<br>';
				 ?>
				 <a href="#" data-toggle="modal" data-target="#myModal">Change</a>
				 <?php
				 echo '<a href="change.php?id='.$news["user_id"].'" title="Change this item">Change</a> | 
				<a href="delete.php?id='.$news["user_id"].'" title="Delete this item">Delete</a><br>
				</div>';
			}

			$db = null; // Close connection

			echo '<br><a href="add.php" title="Add Items">Add Items!</a> | ';

			?>

			<!-- Trigger the modal with a button -->
			<a href="#" data-toggle="modal" data-target="#myModal">Modal</a>
	
		</div><!-- End of col-md-6 div -->
	
	</div><!-- End of row div -->

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

	      	<p class="dark">

	      		<?php 

	      			$input = '<p><script>alert("You won the Nigerian lottery!");</script></p>'; 
	      			echo htmlentities($input, ENT_QUOTES, 'UTF-8');
	      			echo '<br>It should go here.';
	      		?>

	      	</p>
	      
	        <p class="dark">Some text in the modal. <?php echo "the user id is ". $news["user_id"] . ""; ?></p>
	      
	      </div>
	      
	      <div class="modal-footer">
	      
	        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
	      
	      </div>

	    </div>

	  </div>

	</div>

</content>

<?php

	require 'includes/footer.php';

?>

