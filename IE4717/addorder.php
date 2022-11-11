<?php	
		session_start();
		include("dbconnect.php");

		$date=date("Y-m-d");
		$temp=$_SESSION['userId'];

		$addorders= "insert into orders (`Order_id`,`Customer_id`, `Date`) VALUES ('NULL','$temp','$date')";
		$add=$db->query($addorders);

		$getid="select * from orders where Customer_id= '$temp' and Date='$date' ";
		$get=$db->query($getid);
		$retrieve=$get->fetch_assoc();
		$orderid=$retrieve['Order_id'];

		$product_list=implode("','",$_SESSION['cart']);
		$counter=array_count_values($_SESSION['cart']);
		$query="select * from products where Product_Model in('".$product_list."')";
		$result=$db->query($query);
		$num_results=$result->num_rows;
		for($i=0;$i<count($counter);$i++){
			$row=$result->fetch_assoc();
			$productid=$row['Product_id'];
			$price=$row['Price'];													
			$item=$row['Product_Model'];
			$qty=$counter[$item];
			$addorders= "INSERT INTO orderdetails (`Order_id`, `Product_id`, `Price`, `Qty`) VALUES (`$orderid`,`$productid`,`$price`,`$qty`)";
			$checkout=$db->query($addorders);
			}
			
			
			
			$to      = 'f32ee@localhost';
			$subject = 'Order confirmation';
			$message = 'You have ordered the following items:

			';
			$headers = 'From: eeelectronics@localhost' . "\r\n" .
				'Reply-To: f32ee@localhost' . "\r\n" .
				'X-Mailer: PHP/' . phpversion();

			mail($to, $subject, $message, $headers,'-ff32ee@localhost');
			echo ("mail sent to : ".$to);
	?>
<!doctype html>
<html lang="en"> 
	<head> 
		<title>EEElectronics - Checkout</title> 
		<meta charset=“utf-8”> 
		<link rel="stylesheet" href="styling.css">
		
		<script type="text/javascript" src="Menucalc.js">
		
		</script>
		<?php
			
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
					<h1><b>You have ordered successfully!</b></h1>
					<p>A confirmation email will be sent.</p>
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