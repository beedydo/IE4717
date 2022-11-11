<?php
	session_start();
	
?>
<html lang="en"> 
		<head> 
			<title>EEElectronics - Admin Page</title> 
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
									if($_SESSION['valid_user']='admin')
										echo'<li><a href="adminpage.php">Admin page</a></li>';
								}
							?>
						</ul>
					</nav>
					
					<div id="content">
						<h1><b>Select whether to add or update products.</b></h1>
							
							<form method="Post" action="admin/add.php">
								<input type="submit" value="Add Item" id="submit">
							</form>
							<form method="Post" action="admin/update.php">
								<input type="submit" value="Update Item" id="submit">
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
