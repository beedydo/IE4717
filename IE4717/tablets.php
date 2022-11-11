<?php
	session_start();
?>
<!doctype html>
	<html lang="en"> 
		<head> 
			<title>EEElectronics - Tablets</title> 
			<meta charset=“utf-8”> 
			<link rel="stylesheet" href="styling.css">
			<?php
			//check if any Tablets have stock
			$stocksum=0;
			
			
			 // connect to database 
				@ $db = new mysqli('localhost', 'root', '', 'eeelectronics');
				
			// selecting product details from database	
				$query="select * from products where Type = 'Tablet' ";
				$result=$db->query($query);
				$num_results=$result->num_rows;
				
				for($i=0;$i<$num_results;$i++){
					$row=$result->fetch_assoc();
					$product_id[$i]=$row["Product_id"];
					$model[$i]=$row["Product_Model"];
					$picture[$i]=$row["Picture"];
					$description[$i]=$row["Description"];
					$price[$i]=$row["Price"];
					$product_type[$i]=$row["Type"];
					$stock[$i]=$row["Stock"];
					$stocksum=$stocksum+$stock[$i];
				}
				
				if (isset($_GET['addtocart'])) {
					for($i=0;$i<$_GET['quantity'];$i++){
						$_SESSION['cart'][] = $_GET['model'];
					}
					header('location: ' . $_SERVER['PHP_SELF']. '?' . SID);
					exit();
				}
				
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
							<div>
								<h1><b>These tablets are great for writing on the go!</b></h1>
							</div>
							<?php
								//check if totally no stocks
								if(!$stocksum){
									echo "<h3>We apologize, but there are no tablets in stock.<h3>";
								}
								
								//for loop to print all items
								else{
									for($i=0;$i<$num_results;$i++){
										if($stock[$i]!=0){
											echo"
												<form method='get' action='tablets.php'>
													<table class='products'>
															<tr>
																<th colspan='2' style='padding-top:5px; border-bottom:1px solid black;'>
																	<h2 >Model: $model[$i]</h2>
																	<input name='model' value=".$model[$i]." style='display:none;'>
																</th>
															</tr>
																								
														
															<tr>
																<th rowspan='6' style='border-right:1px solid black;'>
																	<img src='$picture[$i]' style='width: 400px; height:300px;'>
																</th>
																
																<td>
																	<h3>Description:</h3><br>
																	 $description[$i]
																</td>
															</tr>
															<tr>
																<td>
																	<p>Price: $$price[$i]</p>
																	<p>Stock: $stock[$i]</p>
																</td>
															</tr>
															<tr>	
																<td>
																	<label for='qty' class='addproduct_label' >Qty:</label>
																	<input type='number' name='quantity' id='quantity' class='product_details' style='width:20px;'>
																</td>
															</tr>	
															<tr>
																<td>
																	<input type='submit' value = 'Add to Cart' name='addtocart' class='addtocart' style='padding-left:10px;'></a>
																</td>
															</tr>
														</table>
														</form>
														<br>
												";
										}
									}
								}
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