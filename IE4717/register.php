<?php // register.php

	include "dbconnect.php";

	if (isset($_POST['submit'])) {
		if (empty($_POST['username']) || empty ($_POST['password'])|| empty ($_POST['password2']) ) {
		echo "Please fill in the required details";
		exit;}
		}
	
	$username = $_POST['username'];
	$password = $_POST['password'];
	$password2 = $_POST['password2'];

	// echo ("$username" . "<br />". "$password2" . "<br />");
	if ($password != $password2) {
		echo "Sorry passwords do not match";
		exit;
		}
		
	
	$checkexists = "Select * from registered_users where user_name='$username' ";
	$check = $db->query($checkexists);
	$num_results=$check->num_rows;
	$existance=$check->fetch_assoc();
	
	if(!$existance){
		$password = md5($password);
		// echo $password;
		$sql = "INSERT INTO registered_users (user_name, password) VALUES ('$username', '$password')";
		//	echo "<br>". $sql. "<br>";
		$result = $db->query($sql);

		if (!$result) 
			echo "Your query failed.";
		else
			echo ' 
			<html>
				<head> 
					<title>EEElectronics - Registration Page</title> 
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
									<li><a href="login.php">Login page</a></li>
								</ul>
							</nav>
							
							<div id="content">	
								<p>You have signed up successfully.</p
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
				</html>';
	}
	
	else{
		echo "<script>";
		echo "alert('Username in use, please try again.');";
		echo "</script>";
	}
?>
	