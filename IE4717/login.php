<?php
	session_start();

?>
<html lang="en"> 
		<head> 
			<title>EEElectronics - Login </title> 
			<meta charset=“utf-8”> 
			<link href="styling.css" rel="stylesheet" type="text/css" />


		</head> 
		
		<body>
			<div id="wrapper">
				<div id="content">
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
				
				<?php
				
			
				if(!empty($_SESSION["userId"])) {
					require_once 'dashboard.php';
				} 
				
				else {
					require_once 'login-form.php';
				}
				function idcheck(){
						echo $_SESSION['valid_user'];
				}

				@idcheck();
				?>

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
