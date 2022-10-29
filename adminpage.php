<html lang="en"> 
		<head> 
			<title>EEElectronics - Admin Page</title> 
			<meta charset=“utf-8”> 
			<link rel="stylesheet" href="styling.css">

			<?php
				$date=0;
				$prices=array();
				
				//connect to database
				@ $db = new mysqli('localhost', 'root', '', 'eeelectronics');
				
				if(mysqli_connect_errno()){
					echo'Error:Could not connect to database. Please try again later.';
					exit;
				}
				
				
				$query="select * from products where Type='Tablets' ";
				$result=$db->query($query);
				$num_results=$result->num_rows;
				
				for($i=0;$i<$num_results;$i++){
					$row=$result->fetch_assoc();
					$prices[$i]=$row["Price"];
				}
				
				/*if (isset($_POST['dateinput'])){
					$date=$_POST['dateinput'];
				}
				
				if($date){
					$max=0;
					$maxtype="";
					$maxprice=0;
					$columns=5;
					$querybydate="SELECT SUM(JustJava) AS JustJava, SUM(SingleAuLait) AS SingleAuLait, SUM(DoubleAulait) AS DoubleAulait,SUM(SingleCappucino) AS SingleCappucino,SUM(DoubleCappucino) AS DoubleCappucino FROM `orders` WHERE Date='".$date."'";
					$resultbydate=$db->query($querybydate);
					$row=$resultbydate->fetch_assoc();
					$sumarray=array($row["JustJava"],$row["SingleAuLait"],$row["DoubleAulait"],$row["SingleCappucino"],$row["DoubleCappucino"]);
					
					for($j=0;$j<$columns;$j++){
						if($sumarray[$j]>$max){
							$max=$sumarray[$j];
							$maxtype=$j;
							$maxprice=$prices[$j];
						}
					}
					
					switch($maxtype){
						case 0:
							$maxtype="JustJava";
							break;
						
						case 1:
							$maxtype="SingleAuLait";
							break;
						
						case 2:
							$maxtype="DoubleAulait";
							break;
						
						case 3:
							$maxtype="SingleCappucino";
							break;
						
						case 4:
							$maxtype="DoubleCappucino";
							break;
						
					}
				}
				
				$db->close();*/
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
					
					<div id="rightcolumn">
						<h1><b>Click here to generate report: </b></h1>
							<!--<form method="post" action="adminpage.php" >
								<div style="text-align:center">
									<label for="date">Date:</label><input type="Date" name="dateinput" id="date" oninput="this.form.submit()" value="<?php echo $date; ?>">
								</div>
							</form>-->
							
							<form method="Post" action="addproduct.php">
								<label for="product_type" class="addproduct_label" class="addproduct_label">Product Type:</label>
								<select type="text" name="product_type" id="product_type" required class="product_details">
									<option value="Computer" name="type_computer">Computer</option>
									<option value="Tablet" name="type_tablet"> Tablet</option>
								</select>
								
								<label for="product_id" class="addproduct_label">Product id</label>
								<input type="text" name="product_id" id="product_id" required class="product_details">
								
								<label for="model" class="addproduct_label">Model:</label>
								<input type="text" name="model" id="model" required class="product_details">
									
								<label for="picture" class="addproduct_label">Picture:</label>
								<input type="text" name="picture" id="picture" required class="product_details">
								 
								<label for="description" class="addproduct_label">Description:</label>
								<textarea type="description" name="description" id="description" required class="product_details"></textarea>
								 
								<label for="price" class="addproduct_label">Price:</label>
								<input type="text" name="price" id="price" required class="product_details">
								 
								<input type="reset" value="Clear" id="clear"><br>
								<input type="submit" value="Add Item" id="submit">
							</form>
							
								<!--<table id="pricesumm" >							
							
									<tr class="oddrow">
										<td>
											
											<label for="product" style="font-size:25px;">
												<input type="checkbox" name="product" id="product" onclick="location.href='totaldollar.php'" class=btn >
												<b>Total dollar sales by products and categories</b>
											</label>
										</td>
									</tr>
									
									<tr>
										<td>
											<input type="checkbox" name="category" id="product" onclick="location.href='totaldollar.php'" class=btn>
											<label for="category" style="font-size:25px;"><b>Total quantity sales by products and categories</b></label>
										</td>
									</tr>
									
									<tr class="oddrow">
										<td>
											<?php if($date)
												echo"Popular option of best selling product: ".$maxtype." $".($max*$maxprice)." ".$date ;
											?>
										</td>
									</tr>
								</table>-->
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
