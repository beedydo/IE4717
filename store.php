<html lang="en"> 
		<head> 
			<title>EEEelectronics - Store</title> 
			<meta charset=“utf-8”> 
			<link rel="stylesheet" href="styling.css">

			<?php
				//create array for displaying price
				$prices=array();	
				$orders=array();
				
				//connect to database
				@ $db = new mysqli('localhost', 'root', '', 'EEElectronics');
				
				if(mysqli_connect_errno()){
					echo'Error:Could not connect to database. Please try again later.';
					exit;
				}
				
				
				$query="select * from products";
				$result=$db->query($query);
				$num_results=$result->num_rows;
				
				for($i=0;$i<$num_results;$i++){
					$row=$result->fetch_assoc();
					$prices[$i]=$row["Price"];
				}
				
				$db->close();
			?>
			
			<script type="text/javascript">
				//initialise price

				var hseprice = <?php echo $prices[0]; ?>;
				var singleau = <?php echo $prices[1]; ?>;
				var doubleau = <?php echo $prices[2]; ?>;
				var singlecap = <?php echo $prices[3]; ?>;
				var doublecap = <?php echo $prices[4]; ?>;
				
			</script>
			
			<script type="text/javascript" src="Menucalc.js">
			</script>
			
		</head> 
		
		<body>
			<div id="wrapper">
				<div id="main">
					<nav>
						<ul>
							<li><a href="index.html">Home</a></li>
							<li><a href="store.php">Store</a></li>
							<li><a href="computers.php">Computers</a></li>
							<li><a href="tablets.html">Tablets</a></li>
							<li><a href="checkout.php">Checkout</a></li>
							<li><a href="adminpage.php">Admin page</a></li>
						</ul>
					</nav>
					
					
					<div id="content">
						<h1><b>Store Catalogue </b></h1>
						
						<table id="catalogue" >
							<?php
									echo"<tr>
											<td class=\"categories\"><b>Computers</b></td>
										</tr>	
										
										<tr>
											<td>
												<img src=\"'.$somevar.'\">
											</td>
											<td>
												<input type=\"number\" name=\"hsenum\" id=\"hsenum\" oninput=\"checkHse()\" value=\"0\" size=10>
											</td>
											<td><input type=\"text\" id=\"hsetotal\" readonly value=\"$0\" ></td>
										</tr>
										
										<tr>
											<td class=\"categories\"><b>Tablets</b></td>
										</tr>
										
										<tr>
											<td>
												<img src=\"'.$somevar.'\">
											</td>
											<td>
												<input type=\"number\" name=\"hsenum\" id=\"hsenum\" oninput=\"checkHse()\" value=\"0\" size=10>
											</td>
											<td><input type=\"text\" id=\"hsetotal\" readonly value=\"$0\" ></td>
										</tr>";
							?>						
						</table>
					</div>
				</div>
				<footer>
					<small>
						<p><i>Copyright &copy; 2022 JavaJam Coffee House</i></p>
						<a href="mailto:wencong@ng.com"><p><i>wencong@ng.com</p></i></a>
					</small>
				</footer>
			</div>
		</body> 
	</html>
