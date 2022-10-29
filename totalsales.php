<html lang="en"> 
		<head> 
			<title>JavaJam Coffee House - Menu</title> 
			<meta charset=“utf-8”> 
			<link rel="stylesheet" href="styling.css">

			<?php
				
				$date=0;
				$sumarray=array(0,0,0,0,0);
				//connect to database
				@ $db = new mysqli('localhost', 'root', '', 'javajam');
				
				if(mysqli_connect_errno()){
					echo'Error:Could not connect to database. Please try again later.';
					exit;
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
						<h1><b>Quantity sales by product and catgories: </b></h1>
							<table id="Qtysales" class="summary">
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
											<b><?php echo $sumarray[0]; ?></b>
										</td>
										<td>
											<b>/</b>
										</td>
										<td>
											<b>/</b>
										</td>
										<td>
											<b><?php echo $sumarray[0]; ?></b>
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
											<b><?php echo $sumarray[1]; ?></b>
										</td>
										<td>
											<b><?php echo $sumarray[2]; ?></b>
										</td>
										<td>
											<b><?php echo $sumarray[1]+$sumarray[2]; ?></b>
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
											<b><?php echo $sumarray[3]; ?></b>
										</td>
										<td>
											<b><?php echo $sumarray[4]; ?></b>
										</td>
										<td>
											<b><?php echo $sumarray[3]+$sumarray[4]; ?></b>
										</td>
									</tr>
								</tbody>
								
								<tfoot>
										<td>
											<b>Total</b>
										</td>
										<td>
											<b><?php echo $sumarray[0]; ?></b>
										</td>
										<td>
											<b><?php echo $sumarray[1]+$sumarray[3]; ?></b>
										</td>
										<td>
											<b><?php echo $sumarray[2]+$sumarray[4]; ?></b>
										</td>
										<td>
											<b><?php echo $sumarray[0]+$sumarray[1]+$sumarray[2]+$sumarray[3]+$sumarray[4]; ?></b>
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
