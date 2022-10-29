<!doctype html>
	<html lang="en"> 
		<head> 
			<title>EEElectronics - Tablets</title> 
			<meta charset=“utf-8”> 
			<link rel="stylesheet" href="styling.css">
			<script type="text/javascript" src="javascript.js"></script>
			<?php
				$prices=array();
	
			 // connect to database 
				@ $db = new mysqli('localhost', 'root', '', 'EEElectronics');
				
			// selecting price from database	
				$query="select * from price where Type = 'Computer' ";
				$result=$db->query($query);
				$num_results=$result->num_rows;
				
				for($i=0;$i<$num_results;$i++){
					$row=$result->fetch_assoc();
					$prices[$i]=$row["Price"];
				}

				
				/*if(isset($_POST['update'])){
				// create short variable names
					$updatehse= $_POST['hse'];
					$updatesingau= $_POST['singleau'];
					$updatedoubau= $_POST['doubleau'];
					$updatesingcap= $_POST['singlecap'];
					$updatedoubcap= $_POST['doublecap'];
					
					for($i=0;$i<$num_results;$i++){
						$row=$result->fetch_assoc();
						switch($i){ 
							case(0):
								if (isset($_POST['changehse'])){
									$update="Update Price set `Price`= '$updatehse' where `Type`='House' ";
									$db->query($update);
								}
								break;
							case(1):
								if (isset($_POST['changesingleau'])){
									$update="Update Price set `Price`= '$updatesingau' where `Type`='SingleAu' ";
									$db->query($update);
								}
								break;
							case(2):		
								if (isset($_POST['changedoubleau'])){
									$update="Update Price set `Price`= '$updatedoubau' where `Type`='DoubleAu' ";
									$db->query($update);
								}
								break;
							case(3):
								if (isset($_POST['changesingcap'])){
									$update="Update Price set `Price`= '$updatesingcap' where `Type`='SingleCap' ";
									$db->query($update);
								}
								break;
							case(4):
								if (isset($_POST['changedoubcap'])){
									$update="Update Price set `Price`= '$updatedoubcap' where `Type`='DoubleCap' ";
									$db->query($update);
								}
								break;
						}
					}
					header('Location:price.php');	
				}*/
				
				$db->close();
			?>
		</head> 
		
		<body>
			<div id="wrapper">
				<div id="main">
					<nav>
						<ul>
							<li><a href="index.html">Home</a></li>
							<li><a href="store.php">Store</a></li>
							<li><a href="computers.html">Computers</a></li>
							<li><a href="tablets.html">Tablets</a></li>
							<li><a href="checkout.php">Checkout</a></li>
							<li><a href="adminpage.php">Admin page</a></li>
						</ul>
					</nav>
					
					
					<div id="rightcolumn">
						<div id="shiftp">
							<h1><b>Want to take notes quickly? These tablets will be right up your alley!</b></h1>
						</div>
							<form method="Post" action="show_post.php">
							  <label for="name" class="jobslabel">*Name:</label>
							  <input type="text" name="name" id="name" placeholder="Enter your name here" required onchange="checkname()" class="jobs">
							  <label for="email" class="jobslabel">*E-mail:</label>
							  <input type="text" name="email" id="email" placeholder="Enter your Email-ID here" required onchange="checkemail()" class="jobs">
							  <label for="date" class="jobslabel">Start Date</label>
							  <input type="date" name="date" id="date" onchange="checkdate()" class="jobs">
							  <label for="experience" class="jobslabel">*Experience:</label>
							  <textarea name="experience" id="experience" placeholder="Enter your past experience here" rows="4" cols="35" required class="jobs"></textarea>
							  <input type="reset" value="Clear" id="clear"><br>
							  <input type="submit" value="Apply Now" id="submit">
							</form>
					</div>
				</div>
				<footer>
					<small>
						<p><i>Copyright &copy; 2022 JavaJam Coffee House</i></p>
						<a href="mailto:wencong@ng.com"><p><i>wencong@ng.com</p></i></a>
					</small>
				</footer>
			</div>
		</body> 
	</html>