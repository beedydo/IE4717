<?php
	session_start();
	
?>

<!doctype html>
	<html lang="en"> 
		<head> 
			<title>EEElectronics</title> 
			<meta charset=“utf-8”> 
			<link rel="stylesheet" href="styling.css">
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
							<?php 
								if(isset($_SESSION['valid_user'])){
									if($_SESSION['valid_user']=='admin')
										echo'<li><a href="adminpage.php">Admin page</a></li>';
									
									else
										echo'<li><a href="profile.php">Profile page</a></li>';
								}
								
								else{
									echo'<li><a href="login.php">Login page</a></li>';
								}
							?>
						</ul>
					</nav>
					
					<div id="content">
						<img id="logo" src="Logo.png" alt="Logo"><br>
						<h1><b>Welcome to EEElectronics, your pitstop for laptops and tablets </b></h1>
							<h2>We offer many different types of laptops and tablets.</h2><br>
							<h3>From Studying to Playing, we have what you need and more!</h3>
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