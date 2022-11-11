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
						
							<?php 
								// connect to database 
								
								include("dbconnect.php");
														
								// declare var pricesum to hold total price of order
									$pricesum=0.0;

                                if(empty($_SESSION["valid_user"])) {
                                    require_once 'login-form.php';
                                }
                                else{
                                    echo' 
                                    <h1><b>Please confirm your order, '.$_SESSION['valid_user'].' .</b></h1>
                                    <form method="Post" action="addorder.php">								
										<label for="update_name" class="addproduct_label" >Your name:</label>
										<input type="text" name="update_name" id="name" placeholder="Enter your name here" class="product_details" onchange="checkname()">
											
										<label for="update_email" class="addproduct_label" >Email:</label>
										<input type="text" name="update_email" id="email" class="product_details" onchange="checkemail()">
										
										<label for="update_address" class="addproduct_label" >Address:</label>
										<textarea type="text" name="update_address" id="update_address" class="product_details"></textarea><br>
										
										<input type="reset" value="Clear" id="clear"><br>
										<input type="submit" value="Confirm Order" id="confirm_order" name="confirm_order">
                               		 </form>
										';
								
									if(isset($_SESSION['cart'])){
										$product_list=implode("','",$_SESSION['cart']);
										$counter=array_count_values($_SESSION['cart']);
										$query="select * from products where Product_Model in('".$product_list."')";
										$result=$db->query($query);
										$num_results=$result->num_rows;
										for($i=0;$i<count($counter);$i++){
											$row=$result->fetch_assoc();													
													$item=$row['Product_Model'];
													$qty=$counter[$item];
													$pricesum=$pricesum+($qty*$row['Price']);
													echo"
														<table class='products'>
															<tr>
																<th colspan='2' style='padding-top:5px; border-bottom:1px solid black;'><h2>Model: ".$item."</h2></th>
																<td></td>
																</tr>
																									
															
															<tr>
																<td rowspan='4 ' style='border-right:1px solid black;'>
																	<img src='".$row['Picture']."' style='width: 500px; height:310px;'>
																</td>
																
																<td>
																	<h3>Description:</h3><br>
																	".$row['Description']."
																</td>
															</tr>
															<tr>
																	<td>
																		<p>Quantity: ".$qty."</p>
																	</td>
															</tr>
															<tr>
																	<td>
																		<p>Price: $".$row['Price']."</p>
																	</td>
															</tr>
															
															
														</table>
														<br>
														";
										}
									}
									$db->close();
									
									echo '
										<form method="Post" action="logout.php">
											<a href="logout.php">Log out</a><br>
										</form>';
									
									
								}
                               
							?>
							
							
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
