<?php
	session_start();
?>
<html lang="en"> 
		<head> 
			<title>EEElectronics - Admin Page</title> 
			<meta charset=“utf-8”> 
			<link rel="stylesheet" href="styling.css">			
			<script type="text/javascript" src="javascript.js">
			</script>
		</head> 
		
		<body>
			<div id="wrapper">
				<div id="main">
					<nav>
						<ul>
							<li><a href="index.php">Home</a></li>
							<li><a href="store.php">Store</a></li>
							<li><a href="computers.php">Computers</a></li>
							<li><a href="tablets.php">Tablets</a></li>
							<li><a href="checkout.php">Checkout</a></li>
							<li><a href="profile.php">Profile</a></li>
						</ul>
					</nav>
					
					<div id="content">
						<h1><b>Welcome to your profile page! <?php echo $_SESSION['valid_user'];?> </b></h1>
							<?php 
								function updatecheck(){
									if($_SESSION['updated']){
										echo "<p>Your details have been successfully updated!</p>";
										unset($_SESSION['updated']);
									}
								}

								@updatecheck();
							?>
							
							<form method="Post" action="updateprofile.php">								
								<label for="update_name" class="addproduct_label" >Your name:</label>
								<input type="text" name="update_name" id="name" placeholder="Enter your name here" class="product_details" onchange="checkname()">
								
								<label for="update_username" class="addproduct_label">Username:</label>
								<input type="text" name="update_username" id="username" placeholder="Enter your username here" class="product_details">
								
								<label for="update_password" class="addproduct_label">Password:</label>
								<input type="text" name="update_password" id="password" class="product_details">
									
								<label for="update_email" class="addproduct_label" >Email:</label>
								<input type="text" name="update_email" id="email" class="product_details" onchange="checkemail()">
								 
								<input type="reset" value="Clear" id="clear"><br>
								<input type="submit" value="Update" id="update" name="update">
							</form>
							
							<form method="Post" action="logout.php">
								<a href="logout.php">Log out</a><br>
							</form>
					</div>
				</div>
				<footer>
					<small>
						<p><i>Copyright &copy; 2022 EEElectronics</i></p>
						<p>Contact us at:
							<a href="mailto:wencong@ng.com"><p><i>wencong@ng.com</p></i></a>
							<a href="mailto:wendae@tan.com"><p><i>wendae@tan.com</p></i></a>
						</p>
					</small>
				</footer>
			</div>
		</body> 
	</html>
