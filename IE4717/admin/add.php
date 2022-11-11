<?php
	session_start();
	
?>
<html lang="en"> 
		<head> 
			<title>EEElectronics - Admin Page</title> 
			<meta charset=“utf-8”> 
			<link rel="stylesheet" href="../styling.css">
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
							<?php 
								if(isset($_SESSION['valid_user'])){
									if($_SESSION['valid_user']='admin')
										echo'<li><a href="../adminpage.php">Admin page</a></li>';
								}
							?>
						</ul>
					</nav>
					
					<div id="content">
						<h1><b>Fill in the details to add products</b></h1>
							
							<form method="Post" action="addproduct.php">
								<label for="product_type" class="addproduct_label" class="addproduct_label">Product Type:</label>
								<select type="text" name="product_type" id="product_type" required class="product_details">
									<option value="Computer" name="type_computer">Computer</option>
									<option value="Tablet" name="type_tablet"> Tablet</option>
								</select>
								
								<label for="product_id" class="addproduct_label">Product id:</label>
								<input type="text" name="product_id" id="product_id" required class="product_details">
								
								<label for="model" class="addproduct_label">Model:</label>
								<input type="text" name="model" id="model" required class="product_details">
									
								<label for="picture" class="addproduct_label">Picture:</label>
								<input type="text" name="picture" id="picture" required class="product_details">
								 
								<label for="description" class="addproduct_label">Description:</label>
								<textarea type="description" name="description" id="description" required class="product_details"></textarea>
								 
								<label for="price" class="addproduct_label">Price:</label>
								<input type="text" name="price" id="price" required class="product_details">
								
								<label for="stock" class="addproduct_label">Stock:</label>
								<input type="number" name="stock" id="stock" required class="product_details">
								 
								<input type="reset" value="Clear" id="clear"><br>
								<input type="submit" value="Add Item" id="submit">
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
