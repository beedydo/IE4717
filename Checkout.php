<!doctype html>
	<html lang="en"> 
		<head> 
			<title>EEElectronics - Checkout</title> 
			<meta charset=“utf-8”> 
			<link rel="stylesheet" href="styling.css">
			
			<script type="text/javascript" src="Menucalc.js">
			
			</script>
			<?php
				$prices=array();
	
			 // connect to database 
				@ $db = new mysqli('localhost', 'root', '', 'EEElectronics');
				
			// selecting price from database	
				$query="select * from price ";
				$result=$db->query($query);
				$num_results=$result->num_rows;
				
				for($i=0;$i<$num_results;$i++){
					$row=$result->fetch_assoc();
					$prices[$i]=$row["Price"];
				}

				
				if(isset($_POST['update'])){
				// create short variable names
					$updatehse= $_POST['hse'];
					$updatesingau= $_POST['singleau'];
					$updatedoubau= $_POST['doubleau'];
					$updatesingcap= $_POST['singlecap'];
					$updatedoubcap= $_POST['doublecap'];
					
					for($i=0;$i<$num_results;$i++){
						$row=$result->fetch_assoc();
						switch($i){ 
							case(0):
								if (isset($_POST['changehse'])){
									$update="Update Price set `Price`= '$updatehse' where `Type`='House' ";
									$db->query($update);
								}
								break;
							case(1):
								if (isset($_POST['changesingleau'])){
									$update="Update Price set `Price`= '$updatesingau' where `Type`='SingleAu' ";
									$db->query($update);
								}
								break;
							case(2):		
								if (isset($_POST['changedoubleau'])){
									$update="Update Price set `Price`= '$updatedoubau' where `Type`='DoubleAu' ";
									$db->query($update);
								}
								break;
							case(3):
								if (isset($_POST['changesingcap'])){
									$update="Update Price set `Price`= '$updatesingcap' where `Type`='SingleCap' ";
									$db->query($update);
								}
								break;
							case(4):
								if (isset($_POST['changedoubcap'])){
									$update="Update Price set `Price`= '$updatedoubcap' where `Type`='DoubleCap' ";
									$db->query($update);
								}
								break;
						}
					}
					header('Location:price.php');	
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
							<li><a href="tablets.html">Tablets</a></li>
							<li><a href="checkout.php">Checkout</a></li>
							<li><a href="adminpage.php">Admin page</a></li>
						</ul>
					</nav>
					
					<div id="content">
						<h1><b>Coffee at JavaJam </b></h1>
						<form method="post" action="price.php" >
							<table id="menu" >
								<tr class="oddrow">
									<td class="drink"><b>Just Java</b></td>
									<td>
										Regular house blend, decaffeinated coffee, or flavour of the day .<br>
										<input type="checkbox" name="changehse" onclick="hse.disabled=!hse.disabled">
										<label for="changehse"><b><?php echo 'Endless Cup $'.$prices[0]; ?></b></label>
									</td>
									<td><input type="text" name="hse"  value="$0" disabled></td>
								</tr>
								
								<tr>
									<td class="drink"><b>Cafe au Lait</b></td>
									<td>
										House blended coffee infused into a smooth, steamed milk.<br>
										<input type="checkbox" name="changesingleau" onclick="singleau.disabled=!singleau.disabled">
										<label for="changesingleau"><b>Single <?php echo'$'.$prices[1] ?></b></label><br>
										
										<input type="checkbox" name="changedoubleau" onclick="doubleau.disabled=!doubleau.disabled">
										<label for="changedoubleau"><b>Double <?php echo'$'.$prices[2] ?></b></label><br>
									</td>
									<td>
										<input type="text"  name="singleau" value="$0" disabled><br>
										<input type="text" name="doubleau" value="$0" disabled>
									</td>
								</tr>
								
								<tr class="oddrow">
									<td class="drink"><b>Iced Cappucino</b></td>
									<td>
										Sweetened espresso blended with icy-cold milk and served in a chilled glass</br>
										<input type="checkbox" name="changesingcap" onclick="singlecap.disabled=!singlecap.disabled">
										<label for="changesingcap"><b>Single <?php echo'$'.$prices[3] ?></b></label><br> 
										
										<input type="checkbox" name="changedoubcap" onclick="doublecap.disabled=!doublecap.disabled">
										<label for="changedoubcap"><b>Double <?php echo'$'.$prices[4] ?></b></label>
									</td>
									<td>
										<input type="text" name="singlecap" value="$0" disabled ><br>
										<input type="text" name="doublecap" value="$0" disabled>
									</td>
								</tr>
								<tr>
									<td></td>
									<td></td>
									<td>
										<input type="submit" name="update" value="Update">
									</td>
									</tr>
							</table>
						</form>
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