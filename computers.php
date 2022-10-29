<!doctype html>
	<html lang="en"> 
		<head> 
			<title>EEElectronics - Computers</title> 
			<meta charset=“utf-8”> 
			<link rel="stylesheet" href="styling.css">
			<?php
				$prices=array();
	
			 // connect to database 
				@ $db = new mysqli('localhost', 'root', '', 'EEElectronics');
				
			// selecting price from database	
				$query="select * from price where Type = 'Computer' ";
				$result=$db->query($query);
				$num_results=$result->num_rows;
				
				for($i=0;$i<$num_results;$i++){
					$row=$result->fetch_assoc();
					$prices[$i]=$row["Price"];
				}

				
				/*if(isset($_POST['update'])){
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
				}*/
				
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
							<div id="shiftp">
								<h1><b>For study or for work, these computers will fit your needs!</b></h1>
							</div>
							<table border="0" id="performer">
								<?php
									for($i=0;$i<$num_computers;$i++){
										echo" Placeholder Text here";
											
									}
									/*<tr>
												<td class="categories"><b>Computers</b></td>
												<td>
													Regular house blend, decaffeinated coffee, or flavour of the day .</br>
													<input type="radio" name="hse" id="hse" onclick="calcHse()">
													<label for="hse"><b> 'Endless Cup $'.$prices[0]; </b></label>
												</td>
												<td>
													<input type="number" name="hsenum" id="hsenum" oninput="checkHse()" value="0" size=10>
												</td>
												<td><input type="text" id="hsetotal" readonly value="$0" ></td>
											</tr>*/
								?>
								
							<thead>
									<tr>
										<th colspan="2"><b>JANUARY</b></th>
								</thead>
								<tbody>	
									<tr>
										<td>
											<img src="woman.png">
										</td>
										<td>
											Melanie Morris entertains with her melodic folk style.</br>
											<b>CDs are available now!</b></br>
											<audio controls>
											  <source src="track.mp3" type="audio/mpeg">
											</audio>
										</td>
									</tr>
								</tbody>
								<thead>
									<tr>
										<th colspan="2"><b>FEBRUARY</b></th>
									</tr>
								</thead>	
								</tbody>
									<tr>
										<td>
											<img src="guitar.png">
										</td>
										<td>
											Tahoe Greg is back from his tour.New songs. New stories.<br>
											<b>CDs are available now!</b></br>
											<audio controls>
											  <source src="track.mp3" type="audio/mpeg">
											</audio>
										</td>
									</tr>
								</tbody>
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