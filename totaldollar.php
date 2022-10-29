<html lang="en"> 
		<head> 
			<title>JavaJam Coffee House - Menu</title> 
			<meta charset=“utf-8”> 
			<link rel="stylesheet" href="styling.css">
			<style>
				#Qtysales thead{
					text-align:center;
					background:none;
					width:100%;
					border: 5px solid black;
				}
			</style>
			<?php
			
				$date=0;
				$prices=array();
				$sumarray=array(0,0,0,0,0);
				//connect to database
				@ $db = new mysqli('localhost', 'root', '', 'javajam');
				
				if(mysqli_connect_errno()){
					echo'Error:Could not connect to database. Please try again later.';
					exit;
				}
				
				
				$query="select * from price ";
				$result=$db->query($query);
				$num_results=$result->num_rows;
				
				for($i=0;$i<$num_results;$i++){
					$row=$result->fetch_assoc();
					$prices[$i]=$row["Price"];
				}
				
				if (isset($_POST['dateinput'])){
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
					
					}
				
				$db->close();
			?>
			
			<script type="text/javascript">
			</script>

			
		</head> 
		
		<body>
			<div id="wrapper">
				<header>
					<img id="logo" src="logo.png" alt="Logo">
				</header>
						<nav>
							<ul>
								<li><a href="index.html">Home</a></li>
								<li><a href="menu.php">Menu</a></li>
								<li><a href="music.html">Music</a></li>
								<li><a href="jobs.html">Jobs</a></li>
								<li><a href="price.php">Price update</a></li>
								<li><a href="adminpage.php">Admin page</a></li>
							</ul>
						</nav>
					
					<div id="rightcolumn">
						<h1><b>Dollar sales by product and catgories: </b></h1>
						<form method="post" action="totaldollar.php" >
								<div style="text-align:center">
									<label for="date">Date:</label><input type="Date" name="dateinput" id="date" oninput="this.form.submit()" value="<?php echo $date; ?>">
								</div>
							</form>
								<table id="Dollarsales" class="summary">
									<thead>
										<td>
											<b>Product</b>
										</td>
										<td>
											<b>Endless Cup</b>
										</td>
										<td>
											<b>Single</b>
										</td>
										<td>
											<b>Double</b>
										</td>
										<td>
											<b>Subtotal</b>
										</td>
									</thead>
									
									<tbody>
										<tr>
											<td>
												<b>Just Java</b>
											</td>
											<td>
												<b><?php echo "$ ".($sumarray[0]*$prices[0]); ?></b>
											</td>
											<td>
												<b>/</b>
											</td>
											<td>
												<b>/</b>
											</td>
											<td>
												<b>
													<?php 
														$JustJavasum=$sumarray[0]*$prices[0];
														echo "$ ".$JustJavasum; ?>
												</b>
											</td>
										</tr>
										
										<tr>
											<td>
												<b>Cafe Au Lait</b>
											</td>
											<td>
												<b>/</b>
											</td>
											<td>
												<b><?php echo "$ ".($sumarray[1]*$prices[1]); ?></b>
											</td>
											<td>
												<b><?php echo "$ ".($sumarray[2]*$prices[2]); ?></b>
											</td>
											<td>
												<b>
													<?php 
														$Aulaitsum=(($sumarray[1]*$prices[1])+($sumarray[2]*$prices[2]));
														echo "$ ".$Aulaitsum; 
													?>
												</b>
											</td>
										</tr>
										
										<tr>
											<td>
												<b>Iced Cappucino</b>
											</td>
											<td>
												<b>/</b>
											</td>
											<td>
												<b><?php echo "$ ".($sumarray[3]*$prices[3]); ?></b>
											</td>
											<td>
												<b><?php echo "$ ".($sumarray[4]*$prices[4]); ?></b>
											</td>
											<td>
												<b>
													<?php 
														$Cappucinosum=(($sumarray[3]*$prices[3])+($sumarray[4]*$prices[4]));
														echo "$ ".$Cappucinosum; 
													?>
												</b>
											</td>
										</tr>
									</body>
									
									<tfoot>
										<td>
											<b>Total</b>
										</td>
										<td>
											<b>
												<?php 
													echo "$".$JustJavasum; 
												?>
											</b>
										</td>
										<td>
											<b>
												<?php echo "$".(($sumarray[1]*$prices[1])+($sumarray[3]*$prices[3])); ?>
											</b>
										</td>
										<td>
											<b>
												<?php echo "$".(($sumarray[2]*$prices[2])+($sumarray[4]*$prices[4])); ?>
											</b>
										</td>
										<td>
											<b>
												<?php echo "$".($JustJavasum+$Aulaitsum+$Cappucinosum); ?>
											</b>
										</td>
									</tfoot>
								</table>
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
