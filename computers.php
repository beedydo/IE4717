<!doctype html>
	<html lang="en"> 
		<head> 
			<title>EEElectronics - Computers</title> 
			<meta charset=“utf-8”> 
			<link rel="stylesheet" href="styling.css">
			<?php
			
			 // connect to database 
				@ $db = new mysqli('localhost', 'root', '', 'eeelectronics');
				
			// selecting product details from database	
				$query="select * from products where Type = 'Computer' ";
				$result=$db->query($query);
				$num_results=$result->num_rows;
				
				for($i=0;$i<$num_results;$i++){
					$row=$result->fetch_assoc();
					$model[$i]=$row["Product_Model"];
					$picture[$i]=$row["Picture"];
					$description[$i]=$row["Description"];
					$price[$i]=$row["Price"];
					$product_type[$i]=$row["Type"];
					
				}

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
							<li><a href="computers.php">Computers</a></li>
							<li><a href="tablets.php">Tablets</a></li>
							<li><a href="checkout.php">Checkout</a></li>
							<li><a href="adminpage.php">Admin page</a></li>
						</ul>
					</nav>
					
					<div id="content">
							<div>
								<h1><b>For study or for work, these computers will fit your needs!</b></h1>
							</div>
							
							<?php
								//for loop to print all items
								for($i=0;$i<$num_results;$i++){
									echo"
											<h2 class='model'>Model: $model[$i]</h2>
																					
											<table border='5' style='border:black;'>
												<tr>
													<th rowspan='3 '>
														<img src='$picture[$i]' style='width: 400px; height:200px;'>
													</th>
													
													<td>
														<p>Description: $description[$i]</p>
													</td>
												</tr>
												<tr>
														<td>
															<p>Price:$$price[$i]</p>
														</td>
												</tr>
												<tr>	
													<td>
														<input type='submit' value = ' Add to Cart'>
													</td>
												</tr>
											</table>
										";
										
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