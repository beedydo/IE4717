<?php	
		@ $db = new mysqli('localhost', 'root', '', 'javajam');
				
		if(mysqli_connect_errno()){
			echo'Error:Could not connect to database. Please try again later.';
			exit;
		}
		
		$purchasedate=date("Y-m-d");
		$order=array(0,0,0,0,0);
		
		$order[0]=$_POST['hsenum'];
		
		if($_POST['Aulait']=='single'){
			$order[1]=$_POST['aulaitnum'];
		}
		
		else if ($_POST['Aulait']=='double'){
			$order[2]=$_POST['aulaitnum'];
		}
		
		if($_POST['Cappucino']=='single'){
			$order[3]=$_POST['capnum'];
		}
		
		else if ($_POST['Cappucino']=='double'){
			$order[4]=$_POST['capnum'];
		}
		
		$orders= "INSERT INTO `orders`(`Order_id`, `JustJava`, `SingleAuLait`, `DoubleAulait`, `SingleCappucino`, `DoubleCappucino`, `Date`) 
				VALUES ('NULL','$order[0]','$order[1]','$order[2]','$order[3]','$order[4]','$purchasedate')";
			
		$checkout=$db->query($orders);
		
		header('Location: menu.php');
		exit()
	?>