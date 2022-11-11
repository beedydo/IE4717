<?php
	session_start();
	
?>
<html lang="en"> 
		<head> 
			<title>EEEelectronics - Store</title> 
			<meta charset=“utf-8”> 
			<link rel="stylesheet" href="styling.css">

			<?php
				// connect to database 
				@ $db = new mysqli('localhost', 'root', '', 'eeelectronics');
				
			// selecting product details from database	
				$query="select * from products where Type = 'Computer' ";
				$result=$db->query($query);
				$row=$result->fetch_assoc();
				$computer_picture=$row["Picture"];
					
				$query="select * from products where Type = 'Tablet' ";
				$result=$db->query($query);
				$tab_row=$result->fetch_assoc();
				$tablet_picture=$tab_row["Picture"];
				
				$db->close();
			?>
			
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
						<h1><b>Store Catalogue </b></h1>
						
						<table id="catalogue" >
							<?php
								echo"
										<h2 style='text-align:left; padding-left:50px; border-bottom:5px solid gray;'>Computers</h2>
										<a href='computers.php'><img src='$computer_picture' style='width: 450px; height:300px;'></a>
												
										<h2 style='text-align:left; padding-left:50px; border-bottom:5px solid gray;'>Tablets</h2>
										<a href='tablets.php'><img src='$tablet_picture' style='width: 450px; height:300px;'></a>
										
									";
							
							?>						
						</table>
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
